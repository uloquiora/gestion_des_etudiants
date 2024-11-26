<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
 
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <title>Vali Admin - Free Bootstrap 5 Admin Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <link rel="stylesheet" type="text/css" href="/css/main.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="/admin/dashboard">Vali</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="bi bi-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Show notifications"><i class="bi bi-bell fs-5"></i></a>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="bi bi-gear me-2 fs-5"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?= site_url('profile') ?>"><i class="bi bi-person me-2 fs-5"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>

          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item " href="/student/dashboard"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="/student/courses"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Courses</span></a></li>
        <li><a class="app-menu__item " href="<?= site_url('profile') ?>"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">profile</span></a></li>
        
      </ul>
    </aside>
    <main class="app-content">
    
      <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <!-- Card Header with Black Background -->
        <div class="card-header bg-dark text-white">
          <h3 class="card-title mb-0">Edit User</h3>
        </div>
        <div class="card-body">
          <form method="post" action="/student/update_user/<?= $user['id'] ?>">
            <!-- Username -->
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input id="username" class="form-control" type="text" name="username" value="<?= $user['username'] ?>" required>
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input id="password" class="form-control" type="password" name="password">
            </div>
            <!-- First Name -->
            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input id="first_name" class="form-control" type="text" name="first_name" value="<?= $user['first_name'] ?>" required>
            </div>
            <!-- Last Name -->
            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input id="last_name" class="form-control" type="text" name="last_name" value="<?= $user['last_name'] ?>" required>
            </div>
            <!-- Role -->
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <input id="role" class="form-control" type="text" name="role" value="<?= $user['role'] ?>" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input id="email" class="form-control" type="email" name="email" value="<?= $user['email'] ?>" required>
            </div>
            <!-- Class -->
            <div class="mb-3">
              <label for="class" class="form-label">Class</label>
              <input id="class" class="form-control" type="text" name="class" value="<?= $user['class'] ?>">
            </div>
            <!-- Actions -->
            <div class="text-end">
              <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Save Changes
              </button>
              <a href="/student/dashboard" class="btn btn-secondary ms-2">
                <i class="bi bi-x-circle"></i> Cancel
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Essential javascripts for application to work-->
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    <script type="text/javascript">
      const salesData = {
      	xAxis: {
      		type: 'category',
      		data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
      	},
      	yAxis: {
      		type: 'value',
      		axisLabel: {
      			formatter: '${value}'
      		}
      	},
      	series: [
      		{
      			data: [150, 230, 224, 218, 135, 147, 260],
      			type: 'line',
      			smooth: true
      		}
      	],
      	tooltip: {
      		trigger: 'axis',
      		formatter: "<b>{b0}:</b> ${c0}"
      	}
      }
      
      const supportRequests = {
      	tooltip: {
      		trigger: 'item'
      	},
      	legend: {
      		orient: 'vertical',
      		left: 'left'
      	},
      	series: [
      		{
      			name: 'Support Requests',
      			type: 'pie',
      			radius: '50%',
      			data: [
      				{ value: 300, name: 'In Progress' },
      				{ value: 50, name: 'Delayed' },
      				{ value: 100, name: 'Complete' }
      			],
      			emphasis: {
      				itemStyle: {
      					shadowBlur: 10,
      					shadowOffsetX: 0,
      					shadowColor: 'rgba(0, 0, 0, 0.5)'
      				}
      			}
      		}
      	]
      };
      
      const salesChartElement = document.getElementById('salesChart');
      const salesChart = echarts.init(salesChartElement, null, { renderer: 'svg' });
      salesChart.setOption(salesData);
      new ResizeObserver(() => salesChart.resize()).observe(salesChartElement);
      
      const supportChartElement = document.getElementById("supportRequestChart")
      const supportChart = echarts.init(supportChartElement, null, { renderer: 'svg' });
      supportChart.setOption(supportRequests);
      new ResizeObserver(() => supportChart.resize()).observe(supportChartElement);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>