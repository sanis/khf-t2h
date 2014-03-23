
<div id="widgetarea">
    <div class="widget">
        <div class="widget-heading">
            <a href="javascript:;" data-toggle="collapse" data-target="#accsummary"><h4>Account Summary</h4></a>
        </div>
        <div class="widget-body collapse in" id="accsummary">
            <div class="widget-block" style="background: #7ccc2e; margin-top:10px;">
                <div class="pull-left">
                    <small>Current Balance</small>
                    <h5>$71,182</h5>
                </div>
                <div class="pull-right"><div id="currentbalance"></div></div>
            </div>
            <div class="widget-block" style="background: #595f69;">
                <div class="pull-left">
                    <small>Account Type</small>
                    <h5>Business Plan A</h5>
                </div>
                <div class="pull-right">
                    <small class="text-right">Monthly</small>
                    <h5>$19<small>.99</small></h5>
                </div>
            </div>
            <span class="more"><a href="#">Upgrade Account</a></span>
        </div>
    </div>

    <div class="widget">
        <div class="widget-heading">
            <a href="javascript:;" data-toggle="collapse" data-target="#storagespace"><h4>Storage Space</h4></a>
        </div>
        <div class="widget-body collapse in" id="storagespace">
            <div class="clearfix" style="margin-bottom: 5px;margin-top:10px;">
                <div class="progress-title pull-left">1.31 GB of 1.50 GB used</div>
                <div class="progress-percentage pull-right">87.3%</div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: 50%"></div>
                <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
                <div class="progress-bar progress-bar-danger" style="width: 12.3%"></div>
            </div>
        </div>
    </div>

    <div class="widget">
        <div class="widget-heading">
            <a href="javascript:;" data-toggle="collapse" data-target="#serverstatus"><h4>Server Status</h4></a>
        </div>
        <div class="widget-body collapse in" id="serverstatus">
            <div class="clearfix" style="padding: 10px 24px;">
                <div class="pull-left">
                    <div class="easypiechart" id="serverload" data-percent="67">
                        <span class="percent"></span>
                    </div>
                    <label for="serverload">Load</label>
                </div>
                <div class="pull-right">
                    <div class="easypiechart" id="ramusage" data-percent="20.6">
                        <span class="percent"></span>
                    </div>
                    <label for="ramusage">RAM: 422MB</label>
                </div>
            </div>
        </div>
    </div>

</div>