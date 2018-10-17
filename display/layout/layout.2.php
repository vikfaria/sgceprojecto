---
layout: base.php
---
  <!-- aside -->
  <div id="aside" class="app-aside modal fade sm nav-dropdown">
    <div class="left navside grey dk" layout="column">
      <div class="navbar no-radius">
        {{>navbar.brand}}
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-border b-{{app.setting.theme.primary}}">
          {{>nav.php}}
        </nav>
      </div>
      <div flex-no-shrink>
        <div ui-include="'../views/blocks/aside.bottom.0.php'"></div>
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 box-radius-1x" role="main">
    <div class="app-header white box-shadow">
       {{>header}}
    </div>
    <div class="app-footer">
      {{>footer}}
    </div>
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->
{{> body}}
<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / content -->

  <!-- theme switcher -->
  <div id="switcher">
    {{>switcher.php}}
  </div>
  <!-- / -->
