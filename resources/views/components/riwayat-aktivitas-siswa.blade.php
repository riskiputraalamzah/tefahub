<section class="riwayat-section-wrapper" aria-label="Riwayat & Log Aktivitas Otomatis">
    
    <!-- Header Riwayat -->
    <div class="riwayat-header-row">
        <div class="riwayat-title-left">
            <img src="{{ asset('assets/riw.webp') }}" alt="Riwayat Icon" class="riwayat-header-icon" width="22" height="22">
            <h2 class="riwayat-title-text">Riwayat & Log Aktivitas Otomatis</h2>
        </div>
        <div class="riwayat-sync-text" id="riwayatSyncStatus">
            <span class="live-indicator-dot" style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#00BA34; margin-right:4px;"></span>
            Real-time Sync
        </div>
    </div>

    <!-- Container for dynamic activities -->
    <div id="riwayatListContainer">
        <!-- Rendered via JS in Realtime -->
        <div class="riwayat-columns-container" id="riwayatColumns">
            <!-- Will be populated dynamically -->
        </div>
        <!-- Empty State Container -->
        <div id="riwayatEmptyState" style="display: none; padding: 2.5rem 1rem; text-align: center; background: #FAFAFC; border-radius: 16px; border: 1.5px dashed #D0D5DD; margin-top: 1rem;">
            <div style="width: 48px; height: 48px; margin: 0 auto 0.75rem; background: #EEF2FF; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </div>
            <h3 style="font-size: 1rem; font-weight: 700; color: #1E293B; margin-bottom: 0.25rem;">Belum Ada Riwayat Aktivitas</h3>
            <p style="font-size: 0.85rem; color: #64748B; max-width: 450px; margin: 0 auto;">Aktivitas saat Anda mengajukan produk BLUD, melamar lowongan BKK, atau memperbarui profil akan otomatis tercatat dan disinkronkan secara real-time.</p>
        </div>
    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function loadRealtimeActivities() {
        fetch('{{ route("siswa.api.dashboard") }}')
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    renderActivities(data.aktivitas || []);
                }
            })
            .catch(err => console.error('Error fetching activities:', err));
    }

    function renderActivities(list) {
        const container = document.getElementById('riwayatColumns');
        const emptyState = document.getElementById('riwayatEmptyState');
        if (!container || !emptyState) return;

        if (!list || list.length === 0) {
            container.innerHTML = '';
            emptyState.style.display = 'block';
            return;
        }

        emptyState.style.display = 'none';

        // Split into 2 columns
        const mid = Math.ceil(list.length / 2);
        const col1 = list.slice(0, mid);
        const col2 = list.slice(mid);

        function renderCol(items) {
            return items.map(item => `
                <div class="riwayat-card-item">
                    <div class="riwayat-card-left">
                        <div style="width: 40px; height: 40px; border-radius: 10px; background: #EEF2FF; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="riwayat-item-content">
                            <h3 class="riwayat-item-title">${escapeHtml(item.judul)}</h3>
                            <p class="riwayat-item-subtitle">${escapeHtml(item.deskripsi || '-')}</p>
                        </div>
                    </div>
                    <div class="riwayat-item-time">${escapeHtml(item.waktu || 'Baru saja')}</div>
                </div>
            `).join('');
        }

        container.innerHTML = `
            <div class="riwayat-column-group">${renderCol(col1)}</div>
            <div class="riwayat-column-group">${renderCol(col2)}</div>
        `;
    }

    const escapeHtml = window.escapeHtml || function(str) {
        return str ? String(str).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m])) : '';
    };

    // Initial load
    loadRealtimeActivities();

    // Polling every 10 seconds for live sync
    setInterval(loadRealtimeActivities, 10000);
});
</script>
