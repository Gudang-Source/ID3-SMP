<nav class="navbar navbar-expand-lg navbar-light  bg-light">
    <a class="navbar-brand" href="#">SMA YKPP Dumai  <small class="text-muted"><small></small></small></a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($data['link'] == 'Home') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Home">Home </a>
            </li>
            <?php if (isset($Session['admin'])): ?>

            <li class="nav-item <?php echo ($data['link'] == 'Data') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Data">Data Training </a>
            </li>
             <li class="nav-item <?php echo ($data['link'] == 'Pohon') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Pohon">Pohon Keputusan </a>
            </li>
             <li class="nav-item <?php echo ($data['link'] == 'Kinerja') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Kinerja">Evaluasi Kinerja </a>
            </li>
        <?php endif;?>
             <li class="nav-item <?php echo ($data['link'] == 'Analisa') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Analisa"> Analisa Kesesuaian / Testing </a>
            </li>

        </ul>
        <?php if (isset($Session['admin'])): ?>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="?hal=Logout">Logout </a>
            </li>
        </ul>
        <?php else: ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="?hal=Login">Login </a>
            </li>
        </ul>
        <?php endif;?>
    </div>
</nav>