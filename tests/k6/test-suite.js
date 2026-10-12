import http from 'k6/http';
import { check, sleep, group } from 'k6';
import { Counter, Rate, Trend } from 'k6/metrics';

// Custom metrics
const errorRate = new Rate('custom_error_rate');
const homeDuration = new Trend('duration_homepage');
const ppdbDuration = new Trend('duration_ppdb');
const bkkDuration = new Trend('duration_bkk');
const loginDuration = new Trend('duration_login');

// Target URL: override with -e BASE_URL=https://tefahub.my.id
const BASE_URL = __ENV.BASE_URL || 'https://tefahub.my.id';
const PROFILE = __ENV.PROFILE || 'visitor_50';

function getOptions() {
    const commonThresholds = {
        http_req_failed: ['rate<0.01'], // failure rate < 1%
        http_req_duration: ['p(95)<2000'], // p95 response time < 2000ms
        custom_error_rate: ['rate<0.01'],
    };

    switch (PROFILE) {
        case 'baseline':
            return {
                stages: [
                    { duration: '20s', target: 10 },
                    { duration: '40s', target: 25 },
                    { duration: '30s', target: 25 },
                    { duration: '15s', target: 0 },
                ],
                thresholds: commonThresholds,
            };
        case 'visitor_50':
            return {
                stages: [
                    { duration: '20s', target: 25 },
                    { duration: '40s', target: 50 },
                    { duration: '30s', target: 50 },
                    { duration: '15s', target: 0 },
                ],
                thresholds: commonThresholds,
            };
        case 'load_100':
            return {
                stages: [
                    { duration: '30s', target: 50 },
                    { duration: '45s', target: 100 },
                    { duration: '45s', target: 100 },
                    { duration: '20s', target: 0 },
                ],
                thresholds: commonThresholds,
            };
        case 'stress_250':
            return {
                stages: [
                    { duration: '30s', target: 50 },
                    { duration: '45s', target: 150 },
                    { duration: '60s', target: 250 },
                    { duration: '30s', target: 0 },
                ],
                thresholds: commonThresholds,
            };
        default: // Quick smoke test
            return {
                vus: 5,
                duration: '15s',
                thresholds: commonThresholds,
            };
    }
}

export const options = getOptions();

const commonHeaders = {
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language': 'id,en-US;q=0.7,en;q=0.3',
    'Accept-Encoding': 'gzip, deflate, br',
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 (TefaHub-LoadTest)',
};

export default function () {
    // ── Journey 1: Homepage ──────────────────────────────────────────────────
    group('01_Homepage', function () {
        const res = http.get(`${BASE_URL}/`, { headers: commonHeaders, timeout: '10s' });
        const success = check(res, {
            'status is 200': (r) => r.status === 200,
            'has HTML body': (r) => r.body && r.body.length > 1000,
            'under 2s': (r) => r.timings.duration < 2000,
        });

        errorRate.add(!success);
        homeDuration.add(res.timings.duration);
    });

    sleep(Math.random() * 1.5 + 0.5); // Realistic think time 0.5s - 2.0s

    // ── Journey 2: PPDB or BKK page (simulate random browsing) ───────────────
    group('02_Public_Services', function () {
        const isPpdb = Math.random() > 0.5;
        const targetPath = isPpdb ? '/ppdb' : '/bkk';
        const res = http.get(`${BASE_URL}${targetPath}`, { headers: commonHeaders, timeout: '10s' });

        const success = check(res, {
            'status is 200': (r) => r.status === 200,
            'content present': (r) => r.body && r.body.length > 500,
        });

        errorRate.add(!success);
        if (isPpdb) {
            ppdbDuration.add(res.timings.duration);
        } else {
            bkkDuration.add(res.timings.duration);
        }
    });

    sleep(Math.random() * 1.5 + 0.5);

    // ── Journey 3: Login Page ────────────────────────────────────────────────
    group('03_Login_Page', function () {
        const res = http.get(`${BASE_URL}/login`, { headers: commonHeaders, timeout: '10s' });
        const success = check(res, {
            'status is 200': (r) => r.status === 200,
            'has login form': (r) => r.body && r.body.includes('password'),
        });

        errorRate.add(!success);
        loginDuration.add(res.timings.duration);
    });

    sleep(Math.random() * 1.5 + 0.5);
}
