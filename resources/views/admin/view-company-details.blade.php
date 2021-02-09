@extends('admin.layout.layout')

@section('title', 'ADMIN - Employer List')

@section('content_header')
    <h1 class="text-dark">COMPANY DETAILS</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-1">
                <img src="{{asset('img/companies/fgsp.png')}}" alt="" width="180" height="180" class="img-fluid">
            </div>
            <div class="col-md-7 mt-3">
                <h4>Feemo Global Solutions Philippines<i class="fas fa-check-circle text-success ml-2"></i></h4> 
                <p class="mb-0"><i class="fas fa-map-marker-alt mr-1"></i> Makati City</p>
                <p class="mb-0"><i class="fas fa-at mr-1"></i>fgsp@email.com</p>
                <p class="mb-0"><i class="fas fa-globe"></i> <a href="fgsp.ph" target="_blank">fgsp.ph</a></p>
            </div>
            <div class="col-md-4 mt-3">
                <p class="mb-0"><i class="fas fa-users mr-2"></i>132 employees</p>
                <p class="mb-0"><i class="fas fa-user-tie mr-2"></i>5 staff</p>
                <p class="mb-0"><i class="fas fa-tshirt mr-2"></i>Casual</p>
                <p class="mb-0"><i class="fas fa-clock mr-2"></i>Mon - Fri 8am - 5pm</p>
                <p class="mb-0"><i class="fas fa-language mr-2"></i>English, Filipino, Japanese</p>
            </div>
        </div>

        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#companyDesc" role="tab" aria-controls="home" aria-selected="true">Company Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#jobPosts" role="tab" aria-controls="profile" aria-selected="false">Job Postings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="contact" aria-selected="false">Reviews</a>
            </li>
            </ul>
            <div class="tab-content col-md-12 mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="companyDesc" role="tabpanel">
                    <h5>ABOUT</h5>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe sunt quod atque nihil eum reprehenderit perferendis quibusdam ipsa soluta, mollitia labore est adipisci amet velit rem eaque, possimus laboriosam consectetur obcaecati totam quo molestiae, praesentium neque libero? Eos ad tempora reiciendis non exercitationem quas, incidunt natus harum nostrum odio iusto praesentium? Aperiam necessitatibus nulla fugiat commodi. Optio ratione doloribus veritatis earum excepturi esse provident nobis aspernatur eaque repudiandae placeat rerum tempora sunt et nisi enim, facilis suscipit itaque libero praesentium dicta, sequi, distinctio facere. Non molestiae quis quisquam veniam obcaecati nisi, porro nihil omnis totam aliquid hic tenetur illum amet. Aliquam corporis commodi impedit, accusamus natus rem nihil illo vero eius voluptas numquam molestias obcaecati, illum asperiores sequi quos cumque at vitae nemo aliquid recusandae nulla? Quo veritatis, quasi cupiditate alias doloremque sit numquam nostrum incidunt? Voluptatem illum eos, vitae, quos qui natus quaerat saepe obcaecati in sequi officiis totam omnis dolorum iusto vero ea inventore repudiandae dolores nostrum architecto praesentium aspernatur nihil. Doloribus assumenda harum labore beatae optio? Placeat suscipit optio, ratione ullam consequuntur fugit similique voluptate ab ea, velit assumenda repellendus sit aliquid distinctio modi minima qui maiores sapiente laudantium eum tenetur veniam. Neque veniam hic sunt animi ducimus. In exercitationem nesciunt, animi sed doloribus vitae beatae dicta maiores impedit perspiciatis rem, possimus tenetur odit, libero facilis harum quos delectus. Mollitia, non accusantium perferendis dolores animi a quo modi quod voluptates consequatur. Voluptates mollitia, saepe iste quia aliquid, corporis quasi dolore, in eos blanditiis repellendus ipsam nobis facere?</p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>MISSION</h5>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veritatis sint debitis consequuntur ducimus optio asperiores aliquam ratione inventore, quisquam nihil, mollitia fugit molestias aut nesciunt voluptates at, assumenda amet iure ea suscipit cum porro blanditiis saepe. Animi quia dignissimos consectetur mollitia, soluta id at voluptatum perspiciatis provident voluptate quasi quae itaque maxime ex labore architecto natus facere enim cum nihil accusantium praesentium fugit ipsam sapiente. Commodi assumenda, dolorem laboriosam soluta necessitatibus veniam? Minus, harum ut? Voluptatem, aliquid iure ex commodi iste culpa vitae fugiat dignissimos rerum illo est distinctio accusantium, animi harum? Voluptas alias libero quasi? Non exercitationem quos nisi voluptates magnam, veniam perferendis dignissimos deleniti amet dolorem dolorum ratione aliquam nesciunt optio provident vero in, corporis illum. Quidem dolores quo aliquam voluptatum dolor, minima doloremque cupiditate obcaecati distinctio quia nisi blanditiis odio exercitationem ab totam recusandae sit quasi illo nemo ad. Expedita, perspiciatis facere? Repellendus temporibus iure minima?</p>
                        </div>
                        <div class="col-md-6">
                            <h5>VISION</h5>
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veritatis sint debitis consequuntur ducimus optio asperiores aliquam ratione inventore, quisquam nihil, mollitia fugit molestias aut nesciunt voluptates at, assumenda amet iure ea suscipit cum porro blanditiis saepe. Animi quia dignissimos consectetur mollitia, soluta id at voluptatum perspiciatis provident voluptate quasi quae itaque maxime ex labore architecto natus facere enim cum nihil accusantium praesentium fugit ipsam sapiente. Commodi assumenda, dolorem laboriosam soluta necessitatibus veniam? Minus, harum ut? Voluptatem, aliquid iure ex commodi iste culpa vitae fugiat dignissimos rerum illo est distinctio accusantium, animi harum? Voluptas alias libero quasi? Non exercitationem quos nisi voluptates magnam, veniam perferendis dignissimos deleniti amet dolorem dolorum ratione aliquam nesciunt optio provident vero in, corporis illum. Quidem dolores quo aliquam voluptatum dolor, minima doloremque cupiditate obcaecati distinctio quia nisi blanditiis odio exercitationem ab totam recusandae sit quasi illo nemo ad. Expedita, perspiciatis facere? Repellendus temporibus iure minima?</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="jobPosts" role="tabpanel">
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/companies/fgsp.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>Software Engineer IV</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/companies/fgsp.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>Software Engineer III</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/companies/fgsp.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>SAP/ABAP Developer</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/companies/fgsp.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>Fullstack Developer</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/companies/fgsp.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>Spring Framework QA</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel">
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/dist/applicant.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>Juan Dela Cruz</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/dist/admin.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>Miguel Dela Fuente</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{asset('img/dist/employer.png')}}" alt="" width="120" height="120" class="img-fluid">
                                </div>
                                <div class="col-md-11">
                                    <h5><strong>Timothy Blake</strong></h5>
                                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nostrum laborum beatae veniam repellendus architecto sunt expedita natus, adipisci asperiores aut suscipit corporis reiciendis doloribus. Sunt a atque voluptatibus pariatur ipsum ratione rerum reiciendis beatae dignissimos aperiam temporibus mollitia ipsam, possimus nam tenetur vitae quasi? Perspiciatis numquam distinctio, obcaecati ipsum molestias tempore dolorem perferendis eius laudantium, tempora expedita vitae iusto deleniti? Nostrum impedit maiores optio debitis blanditiis corporis perspiciatis minima natus mollitia, tenetur, fugit quisquam tempore eius! Accusantium iste nostrum modi deleniti veniam consectetur aliquam dolores dolorum, molestias fuga aperiam quod amet quidem exercitationem eius deserunt, beatae officiis eos architecto!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#employer-sidebar').addClass('menu-open');
            $('#employer').addClass('active');
            $('#employer-list').addClass('active');
        });
    </script>
@endsection