<!-- Tambahkan button toggle untuk mobile dan desktop -->
<button id="sidebarToggle" class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-md bg-gray-800 text-white">
  <i class="fas fa-bars"></i>
</button>
<button id="desktopSidebarToggle" class="hidden lg:block fixed top-4 left-4 z-50 p-2 rounded-md bg-gray-800 text-white">
  <i class="fas fa-bars"></i>
</button>

<!-- Sidebar dengan responsive classes -->
<div id="sidebar" class="fixed h-full z-40 w-64 bg-gray-800 text-white transition-transform duration-300 ease-in-out">
  <div class="p-4 border-b border-gray-700">
    <h1 class="text-2xl font-semibold text-center">DonasiKita</h1>
  </div>
  <nav class="mt-4">
    <ul class="space-y-2">
      <li>
        <a href="<?= base_url('/dashboard') ?>" class="flex items-center px-4 py-3 hover:bg-gray-700">
          <i class="fas fa-tachometer-alt mr-3"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url('/dashboard/program') ?>" class="flex items-center px-4 py-3 hover:bg-gray-700">
          <i class="fas fa-hand-holding-heart mr-3"></i>
          <span>Donasi & Sumbangan</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url('/dashboard/laporan') ?>" class="flex items-center px-4 py-3 hover:bg-gray-700">
          <i class="fas fa-file-alt mr-3"></i>
          <span>Laporan</span>
        </a>
      </li>
    </ul>
  </nav>
</div>

<!-- Overlay untuk mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>

<!-- Script untuk toggle sidebar -->
<script>
// Store sidebar state in localStorage
const SIDEBAR_STATE_KEY = 'sidebarCollapsed';

// Function to handle sidebar toggle
function toggleSidebar(isMobile = false) {
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');
  const mainContent = document.getElementById('mainContent');

  // Get current state
  const isCollapsed = sidebar.classList.contains('-translate-x-full');

  if (isCollapsed) {
    // Buka sidebar
    sidebar.classList.remove('-translate-x-full');
    if (isMobile) {
      overlay.classList.remove('hidden');
    } else {
      // For desktop: adjust main content
      if (mainContent) {
        mainContent.classList.remove('lg:ml-0');
        mainContent.classList.add('lg:ml-64');
      }
      localStorage.setItem(SIDEBAR_STATE_KEY, 'open');
    }
  } else {
    // Tutup sidebar
    sidebar.classList.add('-translate-x-full');
    if (isMobile) {
      overlay.classList.add('hidden');
    } else {
      // For desktop: adjust main content
      if (mainContent) {
        mainContent.classList.remove('lg:ml-64');
        mainContent.classList.add('lg:ml-0');
      }
      localStorage.setItem(SIDEBAR_STATE_KEY, 'closed');
    }
  }
}

// Mobile toggle
document.getElementById('sidebarToggle').addEventListener('click', () => toggleSidebar(true));

// Desktop toggle - Make sure this runs after DOM is loaded
document.getElementById('desktopSidebarToggle').addEventListener('click', () => toggleSidebar(false));

// Overlay click handler
document.getElementById('sidebarOverlay').addEventListener('click', () => toggleSidebar(true));

// Initialize sidebar state from localStorage on page load
document.addEventListener('DOMContentLoaded', () => {
  const sidebarState = localStorage.getItem(SIDEBAR_STATE_KEY);
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('mainContent');

  // Set initial state based on localStorage
  if (sidebarState === 'closed') {
    sidebar.classList.add('-translate-x-full');
    if (mainContent) {
      mainContent.classList.remove('lg:ml-64');
      mainContent.classList.add('lg:ml-0');
    }
  } else {
    // Ensure default open state on desktop
    if (window.innerWidth >= 1024) { // lg breakpoint
      if (mainContent) {
        mainContent.classList.add('lg:ml-64');
        mainContent.classList.remove('lg:ml-0');
      }
    }
  }
});

// Add resize handler to manage responsive behavior
window.addEventListener('resize', () => {
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('mainContent');
  const sidebarState = localStorage.getItem(SIDEBAR_STATE_KEY);

  if (window.innerWidth >= 1024) { // lg breakpoint
    if (sidebarState !== 'closed') {
      sidebar.classList.remove('-translate-x-full');
      if (mainContent) {
        mainContent.classList.add('lg:ml-64');
        mainContent.classList.remove('lg:ml-0');
      }
    }
  }
});
</script>