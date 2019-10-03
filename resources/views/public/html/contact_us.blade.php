@extends("layouts.app")

@section("title","Contact Us | Pet Fashion Management System" )

@section("content")

    <!-- Map -->
    <div class="contact_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.3263402212065!2d90.38686435048582!3d23.735739395177628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8c12b6c9491%3A0xf4720474f9899ed2!2sKatabon%20Pet%20Shop!5e0!3m2!1sen!2sbd!4v1570096992936!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- End Map -->
    
    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing hidden in the middle of text.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing hidden in the middle of text.</p>
                    
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">location</a>
                            <a href="#">fax</a>
                            <a href="#">phone</a>
                            <a href="#">email</a>
                        </div>
                        <div class="address">
                                <a href="#">Road # 05, Shop # 31, Katabon, Dhaka 1230  </a>
                                <a href="#">(626) 935-3026</a>

                         @foreach ($link as $item)
                            <a href="#">{{$item->shop_contact_number}}</a>
                            <a href="#">{{$item->shop_email}}</a>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->


@endsection