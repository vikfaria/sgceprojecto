<div class="row-col">
  <div class="col-sm w w-auto-xs light lt bg-auto">
    <div class="padding pos-rlt">
      <div>
        <button class="btn btn-sm white pull-right hidden-sm-up" ui-toggle-class="show" target="#inbox-menu"><i class="fa fa-bars"></i></button>
        <a ui-sref="app.inbox.compose" class="btn btn-sm white w-xs">Compose</a>
      </div>
      <div class="hidden-xs-down m-t" id="inbox-menu">
        <div class="nav-active-{{app.setting.theme.primary}}">
          <div class="nav nav-pills nav-sm">
              <a class="nav-link" ui-sref="app.inbox.list({fold:fold.filter})" ng-repeat="fold in folds" ui-sref-active="active">
                {{fold.name}}
              </a>
          </div>
        </div>
        <div class="m-y">Labels</div>
        <div class="nav-active-white">
          <ul class="nav nav-pills nav-stacked nav-sm">
            <li class="nav-item" ng-repeat="label in labels" ui-sref-active="active">
              <a class="nav-link" ui-sref="app.inbox.list({fold:label.filter})">
                <i class="fa m-r-sm fa-circle text-muted" color="{{label.color}}" label-color ></i>
                {{label.name}}
              </a>
            </li>
          </ul>
        </div>
        <div class="p-y">
          <form name="label">
            <div class="input-group">
              <input type="text" class="form-control form-control-sm" ng-model="newLabel.name" placeholder="New label" required>
              <span class="input-group-btn">
                <button class="btn btn-default btn-sm no-shadow" type="button" ng-click="addLabel()" ng-disabled="label.$invalid">Add</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm">
    <div ui-view class="padding fade-in"></div>
  </div>
</div>
