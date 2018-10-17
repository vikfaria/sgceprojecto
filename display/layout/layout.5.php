---
layout: base.php
---
  <!-- aside -->
  <div id="aside" class="app-aside box-shadow-z3 modal fade lg nav-expand">
    <div class="left navside white dk" layout="column">
      <div class="navbar navbar-md info no-radius box-shadow-z4">
        {{>navbar.brand.white}}
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll">
          <div ui-include="'../views/blocks/aside.top.4.php'"></div>
          {{>nav.php}}
        </nav>
      </div>
      <div flex-no-shrink>
        <div ui-include="'../views/blocks/aside.bottom.1.php'"></div>
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z3" role="main">
    <div class="app-header info box-shadow-z4 navbar-md">
      {{>header}}
    </div>
    <div class="app-footer">
      {{>footer}}
    </div>
    <div class="app-body" id="view">

<!-- ############ PAGE START-->
{{> body}}
<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

  <!-- theme switcher -->
  <div id="switcher">
    {{>switcher.php}}
  </div>
  <!-- / -->
