<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->request->baseUrl; ?>/img/avatar/medium/logo_web.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Titikoma Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Titikoma', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 'url' => ["/site/index"]],
                    [
                        'label' => 'Post', 
                        'icon' => 'fa fa-clipboard', 
                        'url' => '#',
                        'items' => [
                            ['label' => "Post List", 'icon' => 'fa fa-list', 'url' => ['/cms-post/index']],
                            ['label' => "Add Post", 'icon' => 'fa fa-plus', 'url' => ['/cms-post/create']],
                        ],
                    ],
                    [
                        'label' => 'Category', 
                        'icon' => 'fa fa-archive', 
                        'url' => '#',
                        'items' => [
                            ['label' => "Category List", 'icon' => 'fa fa-list', 'url' => ['/cms-category/index']],
                            ['label' => "Add Category", 'icon' => 'fa fa-plus', 'url' => ['/cms-category/create']],
                        ],
                    ],
                    [
                        'label' => 'Tag', 
                        'icon' => 'fa fa-bookmark', 
                        'url' => '#',
                        'items' => [
                            ['label' => "Tag List", 'icon' => 'fa fa-list', 'url' => ['/cms-tag/index']],
                            ['label' => "Add Tag", 'icon' => 'fa fa-plus', 'url' => ['/cms-tag/create']],
                        ],
                    ],
                    ['label' => 'Comment', 'icon' => 'fa fa-comment', 'url' => ['#']],
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
