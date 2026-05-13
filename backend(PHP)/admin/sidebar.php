<?php if(session_status() == PHP_SESSION_NONE) session_start(); 

$page = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">

  <div>
    <div class="brand-box">
      <h3>🌿 Leafora</h3>
      <p>Admin Dashboard</p>
    </div>

    <div class="menu-section">
      <p class="menu-title">MAIN MENU</p>

      <ul class="sidebar-menu">

       <li class="menu-item <?= ($page == 'dashboard.php') ? 'active' : '' ?>">
  <a href="dashboard.php">
   
    Dashboard
  </a>
</li>

        <li class="menu-item <?= ($page == 'products.php') ? 'active' : '' ?>">
  <a href="products.php">
    
    Products
  </a>
</li>

        
<li class="menu-item <?= ($page == 'orders.php') ? 'active' : '' ?>">
  <a href="orders.php">
   
    Orders
  </a>
</li>

        <li class="menu-item <?= ($page == 'users.php') ? 'active' : '' ?>">
  <a href="users.php">
   
    Users
  </a>
</li>

<li class="menu-item <?= ($page == 'messages.php') ? 'active' : '' ?>">
  <a href="messages.php">
    Messages
  </a>
</li>
      </ul>
    </div>
  </div>

  <div class="logout-section">
    <a href="admin_logout.php" class="logout-btn">
      
      Logout
    </a>
  </div>

</div>

<style>

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

.sidebar{
  width:240px;
  min-height:100vh;
  background: linear-gradient(
    180deg,
    #1d3124 0%,
    #16251c 100%
  );
  position:fixed;
  top:0;
  left:0;
  padding:24px 18px;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  border-right:1px solid rgba(255,255,255,0.05);
  box-shadow: 10px 0 30px rgba(0,0,0,0.18);
}

/* BRAND */

.brand-box{
  padding:10px 12px 24px;
  border-bottom:1px solid rgba(255,255,255,0.06);
  margin-bottom:25px;
}

.brand-box h3{
  color:#9dd4a7;
  font-size:26px;
  font-weight:700;
  margin-bottom:5px;
  letter-spacing:0.5px;
}

.brand-box p{
  color:rgba(255,255,255,0.4);
  font-size:12px;
  letter-spacing:1px;
  text-transform:uppercase;
}

/* MENU */

.menu-title{
  color:rgba(255,255,255,0.28);
  font-size:11px;
  font-weight:600;
  letter-spacing:1.5px;
  margin-bottom:14px;
  padding-left:12px;
}

.sidebar-menu{
  list-style:none;
  padding:0;
}

.menu-item{
  margin-bottom:10px;
}

.menu-item a{
  display:flex;
  align-items:center;
  gap:12px;
  text-decoration:none;
  color:rgba(255,255,255,0.82);
  padding:14px 15px;
  border-radius:14px;
  font-size:14px;
  font-weight:500;
  transition:0.3s ease;
  position:relative;
  overflow:hidden;
}

/* ICON */

.menu-item a span{
  width:24px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:17px;
}

/* HOVER */

.menu-item a:hover{
  background:rgba(48,118,73,0.22);
  color:white;
  transform:translateX(4px);
}

/* ACTIVE */

.menu-item.active a{
  background:linear-gradient(
    135deg,
    #307649,
    #245837
  );
  color:white;
  box-shadow:0 10px 20px rgba(48,118,73,0.25);
}

/* LOGOUT */

.logout-section{
  padding-top:20px;
  border-top:1px solid rgba(255,255,255,0.06);
}

.logout-btn{
  display:flex;
  align-items:center;
  gap:12px;
  text-decoration:none;
  padding:14px 15px;
  border-radius:14px;
  background:rgba(255,107,107,0.08);
  color:#ff7d7d;
  font-size:14px;
  font-weight:500;
  transition:0.3s;
}

.logout-btn:hover{
  background:rgba(255,107,107,0.15);
  color:#ff9c9c;
  transform:translateX(4px);
}

</style>