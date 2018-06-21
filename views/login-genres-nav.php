<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
    <ul class="dropdown-menu multi-column">
        <li>
            <div class="col-sm-1">
                <ul class="multi-column-dropdown">
                    <?php
                    $menus = executeQuery("SELECT * FROM menu WHERE level = 2");
                    foreach($menus as $menu): ?>
                    <li><a href="<?= $menu->href ?>"><?= $menu->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </li>
    </ul>
</li>