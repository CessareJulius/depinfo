<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Perfil de Usuario
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> 
        <?= $this->Html->Link('Inicio', ['controller' => 'Users', 'action' => 'home']); ?>
    </li>
    <li class="active">Perfil de usuario</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-success">
        <div class="box-body box-profile">
            <?= $this->html->image('img/user2-160x160.jpg', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User Profile Picture']); ?>

          <h3 class="profile-username text-center"><?= $current_user['persona']['nombre']." ".$current_user['persona']['apellido'] ?></h3>

          <p class="text-muted text-center"><?= $current_user['role'] ?></p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Cedula </b> <a class="pull-right"><?= $current_user['persona']['cedula'] ?></a>
            </li>
            <li class="list-group-item">
              <b>Telef.</b> <a class="pull-right"><?= $current_user['persona']['telefono'] ?></a>
            </li>
            <li class="list-group-item">
              <b>Cargo</b> <a class="pull-right"><?= $current_user['cargo'] ?></a>
            </li>
          </ul>
        <?php $idPersona = $current_user['persona']['id'];
            echo $this->Html->Link('Editar', ['controller' => 'Personas', 'action' => "edit/$idPersona"], ['class' => 'btn btn-info btn-block']) 
        ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="profile-username text-center">Datos de Usuario</h3>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Usuario </b> <a class="pull-right"><?= $current_user['usuario'] ?></a>
            </li>
            <li class="list-group-item">
                <?php if($current_user['turno'] == 1){ ?>
                    <b>Turno</b> <a class="pull-right">Mañana</a>
                <?php }else{ ?>
                    <b>Turno</b> <a class="pull-right">Tarde</a>
                <?php } ?>
            </li>
          </ul>
        <?php $idUser = $current_user['id'];
            echo $this->Html->Link('Editar', ['controller' => 'Users', 'action' => "edit/$idUser"], ['class' => 'btn btn-info btn-block']) 
        ?>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
          <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </span>
                <span class="description">Shared publicly - 7:30 PM today</span>
              </div>
              <!-- /.user-block -->
              <p>
                Lorem ipsum represents a long-held tradition for designers,
                typographers and the like. Some people hate it and argue for
                its demise, but others ignore the hate as they create awesome
                tools to help create filler text for everyone from bacon lovers
                to Charlie Sheen fans.
              </p>
              <ul class="list-inline">
                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                </li>
                <li class="pull-right">
                  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                    (5)</a></li>
              </ul>

              <input class="form-control input-sm" type="text" placeholder="Type a comment">
            </div>
            <!-- /.post -->

            <!-- Post -->
            <div class="post clearfix">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                      <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </span>
                <span class="description">Sent you a message - 3 days ago</span>
              </div>
              <!-- /.user-block -->
              <p>
                Lorem ipsum represents a long-held tradition for designers,
                typographers and the like. Some people hate it and argue for
                its demise, but others ignore the hate as they create awesome
                tools to help create filler text for everyone from bacon lovers
                to Charlie Sheen fans.
              </p>

              <form class="form-horizontal">
                <div class="form-group margin-bottom-none">
                  <div class="col-sm-9">
                    <input class="form-control input-sm" placeholder="Response">
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.post -->

            <!-- Post -->
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Adam Jones</a>
                      <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </span>
                <span class="description">Posted 5 photos - 5 days ago</span>
              </div>
              <!-- /.user-block -->
              <div class="row margin-bottom">
                <div class="col-sm-6">
                  <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                      <br>
                      <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                      <br>
                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <ul class="list-inline">
                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                </li>
                <li class="pull-right">
                  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                    (5)</a></li>
              </ul>

              <input class="form-control input-sm" type="text" placeholder="Type a comment">
            </div>
            <!-- /.post -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-red">
                      10 Feb. 2014
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                  <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-user bg-aqua"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                  </h3>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-comments bg-yellow"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-green">
                      3 Jan. 2014
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                  <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                <div class="col-sm-10">
                  <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
</div>