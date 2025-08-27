<?php
session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$marketing = $_SESSION["marketing"];

if (!isset($_SESSION["logingundala"])) {
    header("location:https://wo.naraya.co.id/beta/view/login.php");
    exit;
}

$kota = $_SESSION["level_kantor"];
    
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <img src='https://wo.naraya.co.id/beta/img/logoq.png' height="60" width="90">
        <div class="sidebar-brand-text mx-3"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Username yang bisa lihat menu Business Solutions -->
    <?php if ($acces_user_log == "rolies" || $acces_user_log == "vicky" || $acces_user_log == "nyoman" || strpos($acces_user_log, "alvin") !== false || strpos($acces_user_log, "pandu") !== false || strpos($acces_user_log, "herry") !== false || strpos($acces_user_log, "heri") !== false || strpos($acces_user_log, "firman") !== false || strpos($acces_user_log, "joko") !== false) { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBusinessSolutions" aria-expanded="true" aria-controls="collapseBusinessSolutions">
                <i class="fas fa-handshake"></i>
                <span>Business Solutions</span>
            </a>
            <div id="collapseBusinessSolutions" class="collapse" aria-labelledby="headingBusinessSolutions" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/business-solutions">Lead</a>
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/business-solutions/status.php">Status</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <?php if ($level_user != "vendor" && $level_user != "permit" && $level_user != "vendor_marketing") { ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#home" aria-expanded="true" aria-controls="home">
                <i class="fas fa-fw fa fa-home"></i>
                <span>MENU</span>
            </a>
            <div id="home" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">MENU:</h6>
                    <?php if ($level_user != "adminwo_fulus" && $level_user != "psg_dcp" && $level_user != "ikr" && $level_user != "ts" && $level_user != "Admin") { ?>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/index.php">Home</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/index_export.php">Export</a>
                    <?php } ?>
                    <?php if ($level_user != "kapten" && $level_user != "adminwo_fulus") { ?>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/index.php">Home</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/instalasi.php">Instalasi Pararel Modem</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_kapten_disbyu_ts.php">Distribusi BYU</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Verified Pendaftaran -->
        <li class="nav-item">
            <?php if ($level_user == "kapten") { ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pendaftaran" aria-expanded="true" aria-controls="pendaftaran">
                    <i class="fas fa-fw fa fa-map-marker"></i>
                    <span>Verified Pendaftaran</span>
                </a>
                <div id="pendaftaran" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List:</h6>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/pendaftaran_new.php">Pendaftaran</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/coverage.php">Coverage</a>
                    </div>
                </div>
            <?php } ?>
        </li>

        <!-- LIST DATA -->
        <?php if ($level_user != "adminwo_fulus" && $level_user != "psg_dcp") { ?>
            <?php if ($level_user != "Admin" && $level_user != "ikr" && $level_user != "adminwo_fulus") { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>List WO</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">list data</h6>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/ikr_masalah_perijinan.php">Kendala Perijinan Kapten</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/ikr_masalah_pending.php">Kendala Pending Kapten</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/ikr_masalah_batal.php">Batal Pasang</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_kapten_correctiv.php">Instalasi Pararel Modem</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_kapten_disbyu.php">Distribusi Kartu Byu</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_lain_lain_admin.php">Lain Lain</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/survey.php">Survey</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/odp_edit.php">Edit Data ODP</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_instalasi_tiangadmin.php">Instalasi Tiang Verified</a>
                        </div>
                    </div>
                </li>
            <?php } ?>
        <?php } ?>

        <!-- MARKETING -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#marketing" aria-expanded="true" aria-controls="marketing">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Marketing</span>
            </a>
            <div id="marketing" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">MARKETING:</h6>
                    <?php if ($level_user == "kapten") { ?>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/marketing.php">WO Marketing</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/marketing_mgm.php">Rekap MGM</a>
                    <?php } ?>
                    <?php if ($level_user == "ikr") { ?>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/marketing_ts.php">WO Marketing</a>
                    <?php } ?>
                    <?php if ($level_user == "adminwo_fulus") { ?>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_marketing_keuangan.php">WO Marketing</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_marketing_mgm.php">WO MGM</a>
                    <?php } ?>
                </div>
            </div>
        </li>
        <!-- DCP -->
        <li class="nav-item">
            <?php if ($level_user == "kapten") { ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dcp" aria-expanded="true" aria-controls="dcp">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Dcp</span>
                </a>
                <div id="dcp" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">DCP:</h6>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/dcp_kapten.php">DCP KAPTEN</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/dcp_corporate.php">DCP CORPORATE</a>
                    </div>
                </div>
            <?php } ?>
        </li>

        <!-- Pelanggan Dismantle -->
        <?php if ($level_user != "adminwo_fulus" && $level_user != "ikr") { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pelanggandisable" aria-expanded="true" aria-controls="pelanggandisable">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pelanggan Dismantle</span>
                </a>
                <div id="pelanggandisable" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Disable</h6>
                        <?php if ($level_user != "Admin" && $level_user != "ikr" && $level_user != "adminwo_fulus" && $level_user != "kapten") { ?>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_wo_disable_byrequest.php">DCP By Request</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_wo_disable_libur.php">Libur</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_wo_disable_100day.php">Tidak Ada Kejelasan</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/dismantle.php">Dismantle Non Kapten</a>
                        <?php } ?>
                        <?php if ($level_user != "Admin" && $level_user != "psg_dcp" && $level_user != "adminwo_fulus") { ?>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_wo_disable_byrequest_admin.php">DCP By Request</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_modemhilang.php">Tidak Ada Kejelasan</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/dismantle.php">Dismantle Non Kapten</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_wo_disable_berhenti.php">DCP Modem Di Ambil</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_wo_disable_lanjut.php">Pelanggan Lanjut</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_wo_disable_libur.php">Pelanggan Libur</a>
                            <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/dismantle.php">Pelanggan Libur</a>
                        <?php } ?>
                    </div>
                </div>
            </li>
        <?php } ?>

        <!-- REPORT NMC -->
        <?php if ($level_user != "Admin" && $level_user != "psg_dcp" && $level_user != "adminwo_fulus" && $level_user != "ikr") { ?>
            <li class="nav-item">
                <a class="nav-link" href="https://wo.naraya.co.id/beta/view/view_permit_nonikr.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Perijinan Non IKR</span>
                </a>
                <a class="nav-link" href="https://wo.naraya.co.id/beta/view/report_nmc.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Report NMC</span>
                </a>
                <a class="nav-link" href="https://wo.naraya.co.id/beta/view/survey.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Survey</span>
                </a>
                <a class="nav-link" href="https://wo.naraya.co.id/beta/view/dismantle.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Dismantle Not Kapten</span>
                </a>
            </li>
        <?php } ?>

        <!-- Lain - lain -->
        <?php if ($level_user == "ikr") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="https://wo.naraya.co.id/beta/view/lain.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Lain - lain</span>
                </a>
            </li>
        <?php } ?>

        <!-- INTALASI -->
        <?php if ($level_user != "Admin" && $level_user != "ikr" && $level_user != "kapten" && $level_user != "ts" && $level_user != "psg_dcp" && $level_user != "super") { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Intalasi</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pembayaran IKR:</h6>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_ikr_keuangan_notverified.php">Not Verified</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_ikr_keuangan_verified.php">Verified</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Correctiv</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">IKR CORRECTIV:</h6>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_ikrcorrectiv_keuangan_notverified.php">Not Verified</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_ikrcorrectiv_keuangan_verified.php">Verified</a>
                    </div>
                </div>
            </li>
        <?php } ?>

        <?php if (($level_user == "adminwo_fulus") or ($level_user == "kapten")) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permit" aria-expanded="true" aria-controls="permit">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Permit</span>
                </a>

                <div id="permit" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_permit.php">WO Permit </a>

                        <h6 class="collapse-header">Partner Relationship:</h6>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_komitmen_pembayaran_permit.php">Approval</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/permit_nonikr/permit_status.php">Activities</a>
                    </div>
                </div>
            </li>
        <?php } ?>

        <?php if (($level_user == "adminwo_fulus") or ($level_user == "kapten")) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengajuan" aria-expanded="true" aria-controls="pengajuan">

                    <i class="fas fa-shopping-cart"></i>

                    <span>PENGAJUAN</span>

                </a>


                <div id="pengajuan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">PENGAJUAN: </h6>

                        <a class="collapse-item" href="../view/view_pengajuan_keuangan.php">View Pengajuan </a>

                    </div>

                </div>
            </li>
        <?php } ?>
        <!-- Data Pelanggan -->
        <?php if ($level_user != "psg_dcp" && $level_user != "adminwo_fulus") { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
                    <i class="fas fa-user-alt"></i>
                    <span>Data Pelanggan</span>
                </a>
                <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data MAPS</h6>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_user.php">Pelanggan</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_user_odp.php">ODP</a>
                    </div>
                </div>
            </li>
        <?php } ?>
    <?php } ?>

    <!-- REPORT TIANG -->
    <?php if ($level_user == "vendor") { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
                <i class="fas fa-user-alt"></i>
                <span>Report Tiang</span>
            </a>
            <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Report Tiang</h6>
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_instalasi_tiang.php">Instalasi Tiang</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <!-- REPORT MARKETING -->
    <?php if ($level_user == "vendor_marketing") { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
                <i class="fas fa-user-alt"></i>
                <span>Report Marketing</span>
            </a>
            <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Marketing</h6>
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/marketing_ts.php">WO Job Marketing</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <?php if ($level_user == "permit") { ?>
        <!-- Report Permit IKR -->
        <?php if ($acces_user_log != "rolies" && $acces_user_log != "vicky" && $acces_user_log != "nyoman") { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="https://wo.naraya.co.id/beta/view/view_permit.php" aria-expanded="true" aria-controls="surveyor">
                    <i class="fa fa-file-alt"></i>
                    <span>Report Permit IKR</span>
                </a>
            </li>

            <!-- Partner Relationship -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePartnerRelationship" aria-expanded="true" aria-controls="collapsePartnerRelationship">
                    <i class="fas fa-handshake"></i>
                    <span>Partner Relationship</span>
                </a>

                <div id="collapsePartnerRelationship" class="collapse" aria-labelledby="headingPartnerRelationship" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/permit_nonikr/index.php">Partner Head</a>
                        <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/permit_nonikr/permit_status.php">Relationship Status</a>
                    </div>
                </div>
            </li>
        <?php } ?>

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
                <i class="fas fa-user-alt"></i>
                <span>Report Permit</span>
            </a>
            <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Report Permit</h6>
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_permit.php">Data Permit IKR</a>
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/view_permit_nonikr.php">Data Permit Non IKR</a>
                </div>
            </div>
        </li> -->

    <?php } ?>

    <!-- Level adminwo_fulus -->
    <?php if ($_SESSION["level_user"] == "adminwo_fulus") { ?>
        <!-- SURVEYOR -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="https://wo.naraya.co.id/beta/view/view_surveyor.php" aria-expanded="true" aria-controls="surveyor">
                <i class="fa fa-check-circle"></i>
                <span>SURVEYOR</span>
            </a>
        </li> -->

        <!-- Partner Relationship -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="https://wo.naraya.co.id/beta/view/view_komitmen_pembayaran_permit.php" aria-expanded="true" aria-controls="permit">
                <i class="fa fa-check-circle"></i>
                <span>Partner Relationship</span>
            </a>
        </li>
    <?php } ?>

    <!-- Username saiin show menu Partner Relationship -->
    <?php if ($acces_user_log == "saiin") { ?>
        <!-- Partner Relationship -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePartnerRelationship" aria-expanded="true" aria-controls="collapsePartnerRelationship">
                <i class="fas fa-handshake"></i>
                <span>Partner Relationship</span>
            </a>

            <div id="collapsePartnerRelationship" class="collapse" aria-labelledby="headingPartnerRelationship" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/permit_nonikr/index.php">Partner Head</a>
                    <a class="collapse-item" href="https://wo.naraya.co.id/beta/view/permit_nonikr/permit_status.php">Relationship Status</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->