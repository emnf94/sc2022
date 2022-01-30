<?= $this->extend('layout/main') ?>
<?= $this->section('menu') ?>
<li>
    <a href="<?= site_url('layout/index') ?>" class="waves-effect">
        <i class="fa fa-home"></i>
        <span> Beranda </span>
    </a>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect">
        <i class="mdi mdi-table"></i>
        <span> MASTER </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
    </a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="<?= site_url('rekening/index') ?>">Rekening</a></li>
        <li><a href="<?= site_url('datatarget/index') ?>">Data Target</a></li>
    </ul>
</li>
<li>
    <a href="<?= site_url('transaksi/index') ?>" class="waves-effect">
        <i class="fa fa-check"></i>
        <span> TRANSAKSI </span>
    </a>
</li>
<li>
    <a href="<?= site_url('report/index') ?>" class="waves-effect">
        <i class="mdi mdi-equal-box"></i>
        <span> LAPORAN </span>
    </a>
</li>


<?= $this->endSection('') ?>