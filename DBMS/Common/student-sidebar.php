	<div class="row w-100">
	    <button class="show-btn button-show ml-auto">
	        <i class="fa fa-bars py-1" aria-hidden="true"></i>
	    </button>
	</div>
	<nav id="sidebarMenu" class="">
	    <div class="sidebar position-fixed">
	        <div class="sidebar-header">
	            <div class="nav-item">
	                <a class="nav-link text-white" href="../student/student-index.php">
	                    <span class="home"></span>
	                    <i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
	                </a>
	            </div>
	        </div>
	        <ul class="nav flex-column">
	            <li class="nav-item">
	                <a class="nav-link" href="../student/student-personal-information.php">
	                    <span data-feather="file"></span>
	                    <i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Personal Information
	                </a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="../student/student-result.php">
	                    <span data-feather="shopping-cart"></span>
	                    <i class="fa fa-th-list mr-2" aria-hidden="true"></i> Student Results
	                </a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="../student/student-fee.php">
	                    <span data-feather="users"></span>
	                    <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i> Student Fee
	                </a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="../student/student-password.php">
	                    <span data-feather="bar-chart-2"></span>
	                    <i class="fa fa-key mr-2" aria-hidden="true"></i> Change Password
	                </a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="../Logout/logout.php">
	                    <span data-feather="layers"></span>
	                    <i class="fa fa-sign-out fa-lg mr-2"></i> Logout
	                </a>
	            </li>
	        </ul>
	    </div>
	</nav>

	<script>
const toggleBtn = document.querySelector(".show-btn");
const sidebar = document.querySelector(".sidebar");
// undefined
toggleBtn.addEventListener("click", function() {
    sidebar.classList.toggle("show-sidebar");
});
	</script>