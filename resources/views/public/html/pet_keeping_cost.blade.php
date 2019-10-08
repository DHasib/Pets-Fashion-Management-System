@extends("layouts.app")

@section("title","Calculate Pet Keeping Cost | Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->


<!-- Pet Calcutation area  -->
<div class="panel panel-primary ourPro">
  <div class="panel-heading text-uppercase  pnlheading">
    <h3>Tools</h3>
  </div><br>
  <div class="container">
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="list-group">
          <br>
          <div class="panel-heading text-center pnlheading">
            <h5>Categories</h5>
          </div>
          <a class="list-group-item tablinks" onclick="petKeepingCost(event, 'dog')"> <i
              class="fa fa-chevron-right"></i> DOG
          </a>
          <a class="list-group-item tablinks" onclick="petKeepingCost(event, 'birds')"> <i
              class="fa fa-chevron-right"></i> Birds
          </a>
          <a class="list-group-item tablinks" onclick="petKeepingCost(event, 'cat')"> <i
              class="fa fa-chevron-right"></i> Cat
          </a>
          <a class="list-group-item tablinks" onclick="petKeepingCost(event, 'rabbit')"> <i
              class="fa fa-chevron-right"></i> Rabbit
          </a>
          <br>
          <div class="panel-heading text-center pnlheading">
            <h6></h6>
          </div>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 md-8">
        <br>
        <div class="panel-heading pnlheading">Pet Keeping Cost </div>
        <!--Dog Keeping Cost -->
        <section class="col-md-12 calculate tabcontent" id="dog"><br>
          <!-- panel 1 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse1">Dog needs vaccines <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">800 Taka</span></a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 2 Column -->
          <div class="panel-group">
            <div class="panel panel-warning ">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse2">Dog needs flea control <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">1000 Taka</span></a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 3  Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse3">Dog Food <strong class="text-danger">Click Me</strong>
                    <span class="pull-right">2500 Taka</span></a>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 4 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse4">Dog Fenced Backyard <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">500 Taka</span></a>
                </h4>
              </div>
              <div id="collapse4" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 5 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse5">Dog Toys <strong class="text-danger">Click Me</strong>
                    <span class="pull-right">600 Taka</span></a>
                </h4>
              </div>
              <div id="collapse5" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 6 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse6">Dog Cart <strong class="text-danger">Click Me</strong>
                    <span class="pull-right">300 Taka</span></a>
                </h4>
              </div>
              <div id="collapse6" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>

          <strong class="pull-right alert alert-danger">Total Yearly Dog Keeping Basic Cost- 5700 Taka </strong>

        </section>

        <!--Birds Keeping Cost -->
        <section class="col-md-12 calculate tabcontent" id="birds" style="display:none;"><br>
          <!-- panel 1 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse7">Birds needs vaccines <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">800 Taka</span></a>
                </h4>
              </div>
              <div id="collapse7" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 2 Column -->
          <div class="panel-group">
            <div class="panel panel-success ">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse8">Birds needs flea control <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">1500 Taka</span></a>
                </h4>
              </div>
              <div id="collapse8" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 3  Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse9">Birds Food <strong class="text-danger">Click Me</strong>
                    <span class="pull-right">1000 Taka</span></a>
                </h4>
              </div>
              <div id="collapse9" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 4 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse10">Birds Fenced Backyard <strong class="text-danger">Click
                      Me</strong><span class="pull-right">1200 Taka</span></a>
                </h4>
              </div>
              <div id="collapse10" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 5 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse11">Birds Toys <strong class="text-danger">Click Me</strong>
                    <span class="pull-right">300 Taka</span></a>
                </h4>
              </div>
              <div id="collapse11" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 6 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse12">Birds Cart<strong class="text-danger">Click Me</strong>
                    <span class="pull-right">200 Taka</span></a>
                </h4>
              </div>
              <div id="collapse12" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>

          <strong class="pull-right alert alert-danger">Total Yearly Birds Keeping Basic Cost - 5000 Taka </strong>

        </section>

        <!--Cat Keeping Cost -->
        <section class="col-md-12 calculate tabcontent" id="cat" style="display:none;"><br>
          <!-- panel 1 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse13">Cat needs vaccines <strong class="text-danger">Click
                      Me</strong><span class="pull-right">500 Taka</span></a>
                </h4>
              </div>
              <div id="collapse13" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 2 Column -->
          <div class="panel-group">
            <div class="panel panel-warning ">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse14">Cat needs flea control <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">1000 Taka</span></a>
                </h4>
              </div>
              <div id="collapse14" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 3  Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse15">Cat Food <strong class="text-danger">Click
                      Me</strong><span class="pull-right">1700 Taka</span></a>
                </h4>
              </div>
              <div id="collapse15" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 4 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse16">Cat Fenced Backyard <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">900 Taka</span></a>
                </h4>
              </div>
              <div id="collapse16" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 5 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse17">Cat Toys <strong class="text-danger">Click
                      Me</strong><span class="pull-right">400 Taka</span></a>
                </h4>
              </div>
              <div id="collapse17" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 6 Column -->
          <div class="panel-group">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse18">Cat Cart <strong class="text-danger">Click
                      Me</strong><span class="pull-right">350 Taka</span></a>
                </h4>
              </div>
              <div id="collapse18" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>

          <strong class="pull-right alert alert-danger">Total Yearly Cat Keeping Basic Cost- 4850 Taka </strong>

        </section>


        <!--Rabbit Keeping Cost -->
        <section class="col-md-12 calculate tabcontent" id="rabbit" style="display:none;"><br>
          <!-- panel 1 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse19">Rabbit needs vaccines <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">750 Taka</span></a>
                </h4>
              </div>
              <div id="collapse19" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 2 Column -->
          <div class="panel-group">
            <div class="panel panel-success ">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse20">Rabbit needs flea control<strong
                      class="text-danger">Click Me</strong> <span class="pull-right">525 Taka</span></a>
                </h4>
              </div>
              <div id="collapse20" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 3  Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse21">Rabbit Food <strong class="text-danger">Click Me</strong>
                    <span class="pull-right">1200 Taka</span></a>
                </h4>
              </div>
              <div id="collapse21" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 4 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse22">Rabbit Fenced Backyard <strong class="text-danger">Click
                      Me</strong> <span class="pull-right">590 Taka</span></a>
                </h4>
              </div>
              <div id="collapse22" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 5 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse23">Rabbit Toys <strong class="text-danger">Click
                      Me</strong><span class="pull-right">500 Taka</span></a>
                </h4>
              </div>
              <div id="collapse23" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>
          <!-- panel 6 Column -->
          <div class="panel-group">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse24">Rabbit Cart <strong class="text-danger">Click
                      Me</strong><span class="pull-right">450 Taka</span></a>
                </h4>
              </div>
              <div id="collapse24" class="panel-collapse collapse">
                <div style="padding:50px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio expedita
                  fugiat corrupti dignissimos repudiandae modi ratione soluta deleniti, iure, laboriosam pariatur
                  ducimus quaerat obcaecati, doloribus explicabo enim totam ipsa possimus reiciendis velit. Labore,
                  soluta. Repellendus sequi provident reprehenderit debitis? Itaque provident, repellat dolor temporibus
                  neque hic, totam iure nobis, doloribus accusantium adipisci? Quod accusantium debitis nihil veritatis
                  consequuntur officiis libero. Eius deserunt sunt impedit doloribus.</div>
              </div>
            </div>
          </div>

          <strong class="pull-right alert alert-danger">Total Yearly Rabbit Keeping Basic Cost- 4015 Taka </strong>

        </section>

      </div>

    </div><!-- .Row -->
  </div><!-- .Container -->
</div>
<!-- End Our Team Area -->



@endsection