<style>
/* ===== PREMIUM SETTING PAGE ===== */
/* ============================= */
/*      FULL TEMA MINIMARKET    */
/* ============================= */

/* BACKGROUND HALAMAN */
.content-wrapper{
    background: linear-gradient(-45deg,
        #0057b8,
        #e31b23,
        #ffd400,
        #0057b8);
    background-size: 400% 400%;
    animation: bgMarket 10s ease infinite;
    min-height: 100vh;
}

/* SIDEBAR */
.main-sidebar{
    background: linear-gradient(180deg,#0057b8,#003b80) !important;
    position: relative;
}

/* strip warna atas sidebar */
.main-sidebar::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:8px;
    background: linear-gradient(to right,#0057b8,#e31b23,#ffd400);
}

/* logo */
.brand-link{
    background:#0057b8 !important;
    color:white !important;
    border-bottom:1px solid rgba(255,255,255,.1);
}

/* tulisan sidebar */
.main-sidebar .nav-link,
.main-sidebar .nav-icon,
.main-sidebar .brand-text,
.main-sidebar .user-panel a{
    color:white !important;
}

/* menu hover */
.main-sidebar .nav-link{
    border-radius:10px;
    transition:.3s;
}

.main-sidebar .nav-link:hover{
    background:#e31b23 !important;
    transform:translateX(6px);
}

/* menu aktif */
.main-sidebar .nav-link.active{
    background:#ffd400 !important;
    color:black !important;
    font-weight:bold;
}

/* NAVBAR ATAS */
.main-header{
    background: linear-gradient(to right,#0057b8,#e31b23,#ffd400) !important;
}

.main-header .nav-link,
.main-header .navbar-brand,
.main-header h5{
    color:white !important;
}

/* CARD */
.card-premium,
.card{
    border:0 !important;
    border-radius:18px !important;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
    background:rgba(255,255,255,.95);
    backdrop-filter: blur(8px);
}

/* header card */
.card-header{
    background: linear-gradient(to right,#0057b8,#e31b23,#ffd400) !important;
    color:white !important;
    border:0 !important;
}

/* BUTTON */
.btn-primary,
.btn-premium{
    background: linear-gradient(to right,#0057b8,#e31b23) !important;
    border:none !important;
    color:white !important;
    border-radius:12px !important;
    padding:10px 22px !important;
    font-weight:bold;
    transition:.3s;
}

.btn-primary:hover,
.btn-premium:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(0,0,0,.18);
}

/* INPUT */
.form-control{
    border-radius:12px !important;
    border:1px solid #d1d5db !important;
}

.form-control:focus{
    border-color:#0057b8 !important;
    box-shadow:0 0 0 4px rgba(0,87,184,.15) !important;
}

/* MAP */
#map{
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

/* WELCOME LANJAR */
.welcome-lanjar{
    margin:15px 10px;
    padding:12px;
    text-align:center;
    font-weight:bold;
    font-size:20px;
    color:white;
    border-radius:12px;
    background: linear-gradient(90deg,#0057b8,#e31b23,#ffd400);
    background-size:300% 100%;
    animation:
        slideWelcome 1s ease,
        glowWelcome 2s infinite alternate,
        warnaWelcome 4s linear infinite;
}

/* ANIMASI */
@keyframes bgMarket{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

@keyframes slideWelcome{
    from{opacity:0;transform:translateX(-80px);}
    to{opacity:1;transform:translateX(0);}
}

@keyframes glowWelcome{
    from{box-shadow:0 0 8px rgba(255,255,255,.2);}
    to{box-shadow:0 0 20px rgba(255,255,255,.6);}
}

@keyframes warnaWelcome{
    0%{background-position:0% 0;}
    100%{background-position:300% 0;}
}

/* ===== NAVBAR FIX ===== */

.main-header.navbar{
    height: 70px !important;
    padding: 0 20px !important;
    display:flex;
    align-items:center;
}

/* container navbar */
.main-header .container{
    max-width:100% !important;
    padding:0 !important;
    display:flex;
    align-items:center;
    justify-content:space-between;
}

/* logo kiri */
.navbar-brand{
    display:flex !important;
    align-items:center;
    gap:10px;
    margin-right:20px !important;
}

/* menu kanan */
.navbar-nav{
    display:flex;
    align-items:center;
    gap:15px;
}

/* item menu */
.navbar-nav .nav-link{
    padding:10px 14px !important;
    border-radius:8px;
    font-weight:600;
}

/* hover */
.navbar-nav .nav-link:hover{
    background:rgba(255,255,255,.15);
}

/* hilangkan blok oranye aneh */
.main-header::before,
.main-header::after{
    display:none !important;
}

/* Card utama */
.card-premium{
    border:0;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}

/* Header */
.card-premium .card-header{
    background: linear-gradient(90deg,#0057b8,#e31b23,#ffd400);
    color:white;
    border:0;
    padding:18px 22px;
}

.card-premium .card-title{
    font-size:22px;
    font-weight:700;
    margin:0;
}

/* Body */
.card-premium .card-body{
    padding:28px;
    background:white;
}

/* Input */
.form-control{
    border-radius:12px !important;
    height:48px;
    border:1px solid #d1d5db;
    box-shadow:none !important;
}

.form-control:focus{
    border-color:#0057b8;
    box-shadow:0 0 0 4px rgba(0,87,184,.15) !important;
}

/* Label */
label{
    font-weight:700;
    color:#334155;
}

/* Button */
.btn-premium{
    background: linear-gradient(90deg,#0057b8,#e31b23);
    color:white;
    border:none;
    padding:12px 26px;
    border-radius:12px;
    font-weight:700;
    transition:.3s;
}

.btn-premium:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(0,0,0,.15);
    color:white;
}

/* Map */
#map{
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.12);
    margin-top:20px;
}

/* notif */
#notifModern{
    position: fixed;
    top: 20px;
    right: 20px;
    width: 360px;
    background: linear-gradient(135deg,#16a34a,#22c55e);
    color: white;
    border-radius: 18px;
    box-shadow: 0 15px 35px rgba(0,0,0,.25);
    display: flex;
    align-items: center;
    padding: 16px;
    z-index: 9999;
    animation: slideIn .5s ease;
}

.notif-icon{font-size:30px;margin-right:15px;}
.notif-title{font-size:17px;font-weight:bold;}
.notif-text{font-size:14px;}
.notif-close{margin-left:auto;cursor:pointer;font-size:22px;}

@keyframes slideIn{
from{transform:translateX(120%);opacity:0;}
to{transform:translateX(0);opacity:1;}
}
@keyframes slideOut{
from{transform:translateX(0);opacity:1;}
to{transform:translateX(120%);opacity:0;}
}
</style>


<div class="col-md-12">

<div class="card card-premium">

<div class="card-header">
<h3 class="card-title">
<i class="fas fa-cogs"></i> Pengaturan GIS Minimarket Brebes
</h3>
</div>

<div class="card-body">

<?php if (session()->getFlashdata('pesan')) { ?>

<div id="notifModern">
<div class="notif-icon"><i class="fas fa-check-circle"></i></div>

<div>
<div class="notif-title">Berhasil</div>
<div class="notif-text"><?= session()->getFlashdata('pesan'); ?></div>
</div>

<div class="notif-close" onclick="closeNotif()">×</div>
</div>

<audio id="notifSound">
<source src="<?= base_url('sound/tring.mp3') ?>" type="audio/mpeg">
</audio>

<script>
window.onload = function(){
document.getElementById("notifSound").play();
setTimeout(()=>{closeNotif();},4000);
}

function closeNotif(){
let box=document.getElementById("notifModern");
box.style.animation="slideOut .5s ease forwards";
}
</script>

<?php } ?>


<?php echo form_open('Admin/UpdateSetting') ?>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Nama Website</label>
<input name="nama_web" value="<?= $web['nama_web'] ?>" class="form-control" placeholder="Nama Website" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Koordinat Wilayah</label>
<input name="coordinat_wilayah" value="<?= $web['coordinat_wilayah'] ?>" class="form-control" placeholder="-6.87,108.89" required>
</div>
</div>

<div class="col-md-2">
<div class="form-group">
<label>Zoom</label>
<input type="number" name="zoom_view" value="<?= $web['zoom_view'] ?>" min="0" max="20" class="form-control" required>
</div>
</div>

</div>

<button type="submit" class="btn btn-premium">
<i class="fas fa-save"></i> Simpan Setting
</button>

<?php echo form_close() ?>

</div>
</div>

</div>


<div class="col-md-12">
<div id="map" style="width:100%;height:800px;"></div>
</div>


<script>
var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

var peta2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');

var peta3 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png');

var peta4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png');

var map = L.map('map',{
center:[<?= $web['coordinat_wilayah'] ?>],
zoom:<?= $web['zoom_view'] ?>,
layers:[peta1]
});

var baseMaps = {
"OpenStreetMap":peta1,
"Satellite":peta2,
"Modern":peta3,
"Night":peta4
};

L.control.layers(baseMaps).addTo(map);
</script>