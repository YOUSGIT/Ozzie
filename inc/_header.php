<?php
$CatalogProject = new CatalogProject;
$catalogs = $CatalogProject->get_all();
$cats = array();
foreach ($catalogs as $catalog)
{
    $cats[$catalog['id']] = $catalog['title'];
}
?>
<div id="head">

    <h1>
        <a href="index.php" class="logo">奧茲藝術 OZZIE</a>
        <a class="toggle"><i class="fa fa-bars"></i></a>
    </h1>

    <div class="menu">
        <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="news.php">News</a></li>
        </ul>

        <ul>
            <li><a href="projects.php">Projects</a>
                <ul class="sub">
                <?php
                foreach($cats as $catid =>$cat)
                {
                        ?>
                    <li><a href="projects.php?c=<?= $catid; ?>"><?= $cat; ?> </a></li>
                    <?php
                }
                ?>
                </ul>
            </li>
        </ul>
        <ul>
            <li><a href="events.php">Event</a></li>
            <li><a href="organization.php">Organization</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
    <div class="logos">
        <ul>
            <li class="logo1"><a href="#">Logo1 </a></li>
            <li class="logo2"><a href="#">Logo2</a></li>
            <li class="logo3"><a href="#">Logo3</a></li>
            <li class="logo4"><a href="#">Logo4</a></li>
            <li class="logo5"><a href="#">Logo5</a></li>
        </ul>
    </div>
    <div style="clear: both"></div>

</div>

<div id="info">
    <h2>Curating
        <img src="images/home_Curating.png" width="15" height="15"></h2>
    <ul>
        <li>Content Design</li>
        <li>Visual Communication</li>
        <li>Exhibition/Space Design</li>
        <li>Art Direction</li>
    </ul>
</div>