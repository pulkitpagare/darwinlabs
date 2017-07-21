<?php include "header.php";?>

<div class="container" ng-controller="dashboardCtrl">
    <h3>Twitter Search</h3>
    <div>
        <br>
        <form class="form-inline">
            <div class="form-group">
                <input type="search" name="search" placeholder="Enter the keyword" class="form-control" id="search">
            </div>
            <button type="submit" style="    margin-left: 28px;
    padding: 8px 19px;
    font-size: 16px;
    border-radius: 6px;" class="btn btn-default">Submit</button>
        </form>
        <p></p>
        <!--<form action="<?php /*base_url('/dashboard/index')*/?>" method="post">
            <div class="col-sm-10">
                <input type="text" name="search" ng-model="searchUsername" placeholder="Enter the keyword" required class="form-control" id="usr">
            </div>
            <div class="col-sm-2">
                <input type="submit" class="form-control">
            </div>
        </form>-->
    </div>
    <?php if(isset($show)){ ?>
        <div class="box">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Text</th>
                <th>link</th>
                <th>Number of retweet</th>
                </tr>
                </thead>
                <div>
                    <tbody>
                    <?php $i = 1;
                        foreach ($tweets as $key){?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $key->text ?></td>
                        <td><?= $key->source ?></td>
                        <td><?= $key->retweet_count ?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </div>
            </table>
        </div>
    <?php }?>
<!--    <ul uib-pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()"></ul>-->

</div>


<?php include "footer.php";?>
