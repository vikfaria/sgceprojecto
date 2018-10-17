  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header navbar-md white box-shadow">
      <div ui-include="'../views/blocks/header.4.php'"></div>
    </div>
    <div ui-view class="app-body" ng-class="{'container': app.setting.container}" id="view"></div>
    <div class="dark dk pos-rlt" ng-class="{'hide': $state.current.data.hideFooter}">
      <div class="p-md" ng-class="{'container': app.setting.container}" >
        <div ui-include="'../views/blocks/footer.1.php'"></div>
      </div>
    </div>
  </div>
  <!-- / -->

  <!-- theme switcher -->
  <div id="switcher">
    <div ui-include="'../views/blocks/switcher.php'"></div>
  </div>
  <!-- / -->
