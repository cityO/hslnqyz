<met_meta page="$met_page" />
<header class='met-head' m-id='met_head' m-type="head_nav">
    <nav class="navbar navbar-default box-shadow-none met-nav">
        <div class="container">
            <div class="row">
                <h1 hidden>{$c.met_webname}</h1>
                <div class="navbar-header pull-xs-left">
                    <a href="{$c.index_url}" class="met-logo vertical-align block pull-xs-left" title="{$c.met_webname}">
                        <div class="vertical-align-middle">
                            <img src="{$c.met_logo}" alt="{$c.met_webname}"></div>
                    </a>
                </div>
                <button type="button" class="navbar-toggler hamburger hamburger-close collapsed p-x-5 met-nav-toggler" data-target="#met-nav-collapse" data-toggle="collapse">
                    <span class="sr-only"></span>
                    <span class="hamburger-bar"></span>
                </button>
                <if value="$c['met_member_register']">
                <button type="button" class="navbar-toggler collapsed m-0 p-x-5 met-head-user-toggler" data-target="#met-head-user-collapse" data-toggle="collapse"> <i class="icon wb-user-circle" aria-hidden="true"></i>
                </button>
                </if>
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id='met-head-user-collapse'>
                    <if value="$c['met_member_register']">
                        <if value="$user">
                            <ul class="navbar-nav pull-md-right vertical-align p-l-0 margin-bottom-0 met-head-user" m-id="member" m-type="member">
    <li class="dropdown">
        <a
            href="javascript:;"
            class="navbar-avatar dropdown-toggle"
            data-toggle="dropdown"
            aria-expanded="false"
        >
            <span class="avatar m-r-5"><img src="{$user.head}" alt="{$user.username}"/></span>
            {$user.username}
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right animate">
            <li class="dropdown-item" role="presentation">
                <a href="{$c.met_weburl}member/basic.php?lang={$_M[lang]}" title='{$word.memberIndex9}' role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {$word.memberIndex9}</a>
            </li>
            <li class="dropdown-item" role="presentation">
                <a href="{$c.met_weburl}member/basic.php?lang={$_M[lang]}&a=dosafety" title='{$word.accsafe}' role="menuitem"><i class="icon wb-lock" aria-hidden="true"></i> {$word.accsafe}</a>
            </li>

            <li class="divider" role="presentation"></li>
            <li class="dropdown-item" role="presentation">
                <a href="{$c.met_weburl}member/login.php?lang={$_M[lang]}&a=dologout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {$word.memberIndex10}</a>
            </li>
        </ul>
    </li>
</ul>
                            <else/>
                            <ul class="navbar-nav pull-md-right vertical-align p-l-0 m-b-0 met-head-user no-login text-xs-center" m-id="member" m-type="member">
                                <li class=" text-xs-center vertical-align-middle animation-slide-top">
                                    <a href="{$c.met_weburl}member/login.php?lang={$_M[lang]}" class="met_navbtn">{$word.login}</a>
                                    <a href="{$c.met_weburl}member/register_include.php?lang={$_M[lang]}" class="met_navbtn">{$word.register}</a>
                                </li>
                            </ul>
                        </if>
                    </if>
                    <div class="metlang m-l-15 pull-md-right text-xs-center">
                        <if value="$c['met_ch_lang'] && $lang['cn1_position'] eq 1">
                            <if value="$lang['cn1_ok']">
                                <if value="$data[lang] eq cn || $data[lang] eq zh">
                                    <span id='btn-convert' class="met_navbtn" m-id="lang" m-type="lang">繁体</span>
                                </if>
                            </if>
                        </if>
                        <if value="$c['met_lang_mark'] && $lang['langlist_position'] eq 1">
                        <div class="met-langlist vertical-align" m-type="lang" m-id="lang">
                            <div class="inline-block  dropdown">
                                <lang></lang>
                                <if value="$sub gt 1">
                                <lang>
                                <if value="$data['lang'] eq $v['mark']">
                                <span data-toggle="dropdown" class="met_navbtn dropdown-toggle">
                                    <if value="$lang['langlist1_icon_ok']">
                                    <span class="flag-icon flag-icon-{$v.iconname}"></span>
                                    </if>
                                    <span >{$v.name}</span>
                                </span>
                                </if>
                                </lang>
                                <ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
                                    <lang>
                                    <a href="{$v.met_weburl}" title="{$v.name}" <if value="$v[newwindows] eq 1">target="_blank"</if> class='dropdown-item'>
                                        <if value="$lang['langlist1_icon_ok']">
                                        <span class="flag-icon flag-icon-{$v.iconname}"></span>
                                        </if>
                                        {$v.name}
                                    </a>
                                    </lang>
                                </ul>
                                </if>
                            </div>
                        </div>
                        </if>
                    </div>
                </div>
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id="met-nav-collapse">
                    <ul class="nav navbar-nav navlist">
                        <li class='nav-item'>
                            <a href="{$c.index_url}" title="{$word.home}" class="nav-link
                            <if value="$data['classnow'] eq 10001">
                            active
                            </if>
                            ">{$word.home}</a>
                        </li>
                        <tag action='category' type='head' class='active'>
                        <if value="$lang['navbarok'] && $m['sub']">
                        <li class="nav-item dropdown m-l-{$lang.nav_ml}">
                            <if value="$lang['navbarok']">
                            <a
                                href="{$m.url}"
                                title="{$m.name}"
                                {$m.urlnew}
                                class="nav-link dropdown-toggle {$m.class}"
                                data-toggle="dropdown" data-hover="dropdown"
                            >
                            <else/>
                            <a
                                href="{$m.url}"
                                {$m.urlnew}
                                title="{$m.name}"
                                class="nav-link dropdown-toggle {$m.class}"
                                data-toggle="dropdown"
                            >
                            </if>
                            {$m.name}<span class="fa fa-angle-down p-l-5"></span></a>
                            <if value="$lang['navbullet_ok']">
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-bullet">
                            <else/>
                            <div class="dropdown-menu dropdown-menu-right animate">
                            </if>
                            <if value="$m['module'] neq 1">
                                <a href="{$m.url}" {$m.urlnew}  title="{$lang.all}" class='dropdown-item nav-parent hidden-lg-up {$m.class}'>{$lang.all}</a>
                            </if>
                                <tag action='category' cid="$m['id']" type='son' class='active'>
                                <if value="$m['sub']">
                                <div class="dropdown-item dropdown-submenu">
                                    <a href="{$m.url}" {$m.urlnew} class="dropdown-item {$m.class}">{$m.name}</a>
                                    <div class="dropdown-menu animate">
                                        <tag action='category' cid="$m['id']" type='son' class='active'>
                                            <a href="{$m.url}" {$m.urlnew} class="dropdown-item {$m.class}" >{$m.name}</a>
                                        </tag>
                                    </div>
                                </div>
                                <else/>
                                <a href="{$m.url}" {$m.urlnew} title="{$m.name}" class='dropdown-item {$m.class}'>{$m.name}</a>
                                </if>
                                </tag>
                            </div>
                        </li>
                        <else/>
                        <li class='nav-item'>
                            <a href="{$m.url}" {$m.urlnew} title="{$m.name}" class="nav-link {$m.class}">{$m.name}</a>
                        </li>
                        </if>
                        </tag>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<tag action="banner.list"></tag>
<if value="$sub || $data['classnow'] eq 10001">
<div class="met-banner carousel slide" id="exampleCarouselDefault" data-ride="carousel" m-id='banner'  m-type='banner'>
    <ol class="carousel-indicators carousel-indicators-fall">
        <tag action="banner.list">
            <li data-slide-to="{$v._index}" data-target="#exampleCarouselDefault" class="<if value="$v['_first']">active</if>"></li>
        </tag>
    </ol>
    <div class="carousel-inner <if value="$data['classnow'] eq 10001 && $sub eq 0">met-banner-mh</if>" role="listbox">
        <tag action="banner.list">
            <div class="carousel-item <if value="$v['_first']">active</if>">
            <if value="$v['img_link']">
                <a href="{$v.img_link}" title="{$v.img_des}" target='_blank'>
            </if>
                <img class="w-full" src="{$v.img_path}" srcset='{$v.img_path} 767w,{$v.img_path}' sizes="(max-width: 767px) 767px" alt="{$v.img_title}" pch="{$v.height}" adh="{$v.height_t}" iph="{$v.height_m}">
                <if value="$v['img_title']">
                    <div class="met-banner-text" met-imgmask>
                        <div class='container'>
                            <div class='met-banner-text-con p-{$v.img_text_position}'>
                                <div>
                                    <h3 class="animation-slide-top animation-delay-300 font-weight-500" style="color:{$v.img_title_color}">{$v.img_title}</h3>
                                    <p class="animation-slide-bottom animation-delay-600" style='color:{$v.img_des_color}'>{$v.img_des}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </if>
            <if value="$v['img_link']">
                </a>
            </if>
            </div>
        </tag>
        <a class="left carousel-control" href="#exampleCarouselDefault" role="button" data-slide="prev">
          <span class="icon" aria-hidden="true"><</span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#exampleCarouselDefault" role="button" data-slide="next">
          <span class="icon" aria-hidden="true">></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<else/>
<if value="$data['classnow'] neq 10001">
    <tag action='category' type="current" cid="$data['class1']">
    <div class="met-banner-ny vertical-align text-center" m-id="banner">
        <h1 class="vertical-align-middle">{$m[name]}</h1>
    </div>
    </tag>
</if>
</if>
<if value="$data['classnow'] neq 10001">
<include file="position.php" />
<include file="subcolumn_nav.php" />
</if>