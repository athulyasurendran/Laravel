{{App\Http\Controllers\FrontController::get_header()}}
    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1>Explore the beauty of Qatar</h1>
            <p class="tagline">Find great places in Qatar to stay, eat, shop, or visit.</p>
        </div>
        <div class="img-holder mt-3 search_control">

            {!! Form::open(['route' => array('search') ,'method' => 'GET' ,'files' => true]) !!}
                <div class="form-group row">
                    <div class="col-12">
                        {{ Form::text('location', null, array('class'=>'input', 'id'=>'searchloc', 'placeholder'=>'What are you looking for?'))}}
                        {{ Form::submit('Search', array('class'=>'button'))}}
                    </div>
                </div>
                <input type="hidden" name="latitude" id="lat">
                <input type="hidden" name="longitude" id="lng">
            {!! Form::close() !!}
        </div>
    </header>

    <div class="client-logos">
        <div class="container text-center">
            <a href="{{route('list', 'shop')}}">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Shop</span>
            </a>
            <a href="{{route('list', 'food')}}">            
                <span class="cat__icon"><svg width="24" height="26" viewBox="0 0 24 26" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-12 -11)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><g fill="currentColor"><path d="M18.372 36.737h-.036c-1.278 0-2.32-1.04-2.32-2.32V24.244c0-.836-.37-1.644-1.04-2.278-1.237-1.163-1.946-2.882-1.946-4.715 0-3.367 2.39-6.106 5.325-6.106 2.938 0 5.325 2.74 5.325 6.106 0 1.833-.71 3.552-1.946 4.715-.672.634-1.043 1.442-1.043 2.278v10.17c0 1.282-1.04 2.322-2.318 2.322zm-.02-24.55c-2.363 0-4.285 2.273-4.285 5.065 0 1.547.59 2.99 1.617 3.96.884.83 1.37 1.907 1.37 3.033v10.17c0 .707.575 1.282 1.28 1.282h.036c.706 0 1.28-.575 1.28-1.28V24.244c0-1.126.487-2.202 1.37-3.034 1.03-.968 1.62-2.41 1.62-3.958.002-2.794-1.922-5.066-4.287-5.066zM29.983 36.737h-.036c-1.28 0-2.32-1.04-2.32-2.32V24.244c0-.836-.37-1.644-1.04-2.278-1.237-1.163-1.946-2.882-1.946-4.715 0-1.406 0-3.155 1.094-4.374.21-.23.49-.357.797-.357.582 0 1.056.46 1.077 1.033l.448 3.343c.01.072.127.053.133-.002l.46-4.1c.015-.487.364-.91.843-1.017.04-.007.075-.013.113-.013h.728c.04 0 .077.004.113.013.478.106.828.53.843 1.016l.46 4.1c.01.075.125.056.132.003l.45-3.343c.02-.572.495-1.032 1.075-1.032.307 0 .588.127.796.358 1.093 1.22 1.093 2.968 1.093 4.374 0 1.833-.71 3.552-1.945 4.715-.67.634-1.042 1.444-1.042 2.278v10.17c-.002 1.282-1.042 2.322-2.323 2.322zm-3.865-23.512l.386.347c-.766.854-.826 2.118-.826 3.68 0 1.547.59 2.99 1.617 3.96.883.83 1.37 1.907 1.37 3.033v10.17c0 .707.575 1.282 1.28 1.282h.036c.706 0 1.282-.575 1.282-1.28V24.244c0-1.126.486-2.202 1.37-3.034 1.028-.968 1.617-2.41 1.617-3.958 0-1.562-.062-2.826-.828-3.68 0 .023-.062.067-.066.09l-.452 3.372c-.072.545-.542.956-1.092.956-.57 0-1.042-.42-1.105-.978l-.46-4.126c-.003-.02-.005-.038-.005-.06l.004-.02h-.533c-.008.023-.03.063-.03.08l-.462 4.126c-.062.557-.533.978-1.095.978-.56 0-1.03-.41-1.1-.956l-.453-3.373c-.003-.02-.003-.044-.003-.067l-.452-.368z"></path><path d="M18.397 21.105c-1.72 0-3.118-1.67-3.118-3.723 0-2.054 1.397-3.724 3.117-3.724.216 0 .39.174.39.39 0 .215-.174.39-.39.39-1.29 0-2.338 1.32-2.338 2.944 0 1.623 1.046 2.944 2.337 2.944.216 0 .39.174.39.39 0 .215-.174.39-.39.39z"></path></g></g></svg></span>
            <span class="cat__text">Eat</span>
            </a>
            <a href="{{route('list', 'stay')}}">
                <span class="cat__icon"><svg width="24" height="23" viewBox="0 0 24 23" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-12 -13)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><g fill="currentColor"><path d="M32.945 19.578l2.705 9.47-1.3.372-2.707-9.47 1.302-.372zM14.732 19.58l1.3.37-2.705 9.47-1.302-.37 2.707-9.47z"></path><path d="M32.97 20.44H29.59V19.09h2.03v-4.394c0-.17-.09-.34-.29-.34H16.736c-.276 0-.64.23-.678.355l.002 4.378h2.028v1.353h-3.382v-5.746c0-1.034 1.2-1.694 2.03-1.694h14.593c.92 0 1.64.744 1.64 1.694v5.747zM34.324 34.647h-20.97c-.747 0-1.354-.607-1.354-1.353v-3.382c0-.746.607-1.353 1.353-1.353h20.97c.747 0 1.353.606 1.353 1.352v3.382c0 .746-.606 1.353-1.352 1.353zm-20.97-4.735v3.382h20.97v-3.382h-20.97z"></path><path d="M21.47 21.794h-2.705c-.746 0-1.353-.607-1.353-1.353v-2.028c0-.746.607-1.353 1.353-1.353h2.706c.747 0 1.354.606 1.354 1.352v2.03c0 .745-.607 1.352-1.353 1.352zm-2.705-3.382v2.03h2.706v-2.03h-2.705zM28.912 21.794h-2.706c-.746 0-1.353-.607-1.353-1.353v-2.028c0-.746.607-1.353 1.353-1.353h2.706c.746 0 1.353.606 1.353 1.352v2.03c0 .745-.607 1.352-1.353 1.352zm-2.706-3.382v2.03h2.706v-2.03h-2.706z"></path><path d="M22.147 19.088h3.382v1.353h-3.383zM14.03 33.97h1.352V36H14.03zM32.294 33.97h1.353V36h-1.353z"></path></g></g></svg></span>
                <span class="cat__text">Stay</span>
            </a>
            <a href="{{route('list', 'visit')}}">
                <span class="cat__icon"><svg width="30" height="28" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-9 -10)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><g fill="currentColor"><path d="M21.383 31.392c.206-.077.39-.21.53-.38l8.845-10.78c.213-.26.313-.587.28-.922-.034-.335-.195-.637-.455-.85l-5.395-4.427c-.347-.285-.823-.363-1.243-.205-.207.077-.39.21-.53.38l-8.845 10.78c-.214.26-.313.587-.28.922.033.335.194.637.455.85l5.395 4.427c.346.285.823.363 1.243.205zm-6.08-5.802l8.846-10.78c.035-.044.08-.075.13-.094.1-.037.216-.022.305.05l5.395 4.428c.133.108.152.303.043.436l-8.845 10.78c-.036.043-.08.075-.13.093-.1.038-.217.023-.306-.05l-5.395-4.427c-.132-.108-.152-.304-.043-.436z"></path><path d="M20.458 24.595l1.77-.38c.07-.007.14.02.186.073l1.013 1.47c.073.083.18.1.27.067.04-.015.076-.04.104-.073.025-.03.043-.064.05-.106l.186-1.782c.007-.034.022-.065.044-.092.022-.026.05-.048.082-.06l1.71-.53c.04-.017.072-.04.096-.07.09-.11.07-.29-.07-.368l-1.637-.706c-.06-.035-.1-.098-.107-.168l.027-1.81c-.014-.17-.186-.263-.33-.21-.027.01-.054.027-.08.05l-1.177 1.36c-.02.02-.044.033-.07.042-.038.015-.08.018-.123.008l-1.713-.605c-.05-.012-.1-.007-.14.01-.042.014-.078.04-.105.073-.055.067-.075.164-.033.256l.927 1.562c.03.064.025.138-.012.2l-1.104 1.42c-.103.174.037.392.238.37z"></path><path d="M38.827 23.72l-3.344-6.148c-.19-.35-.553-.57-.95-.582-.195-.005-.39.042-.56.135-.218.12-.458.186-.703.205.043-.314.167-.613.374-.864.387-.473.318-1.172-.154-1.56l-5.385-4.418c-.305-.25-.724-.32-1.094-.18-.18.068-.34.183-.465.333-.194.238-.446.42-.73.526-.58.22-1.24.11-1.72-.283-.305-.25-.724-.32-1.094-.18-.18.07-.34.183-.465.334L11.288 24.744c-.387.472-.318 1.172.154 1.56.36.295.583.712.63 1.175.045.462-.093.915-.388 1.274-.387.473-.32 1.172.154 1.56l2.235 1.834 2.113 3.886c.19.35.554.57.95.58.196.006.39-.04.56-.134.27-.146.574-.22.88-.212.624.016 1.196.366 1.494.914.19.348.554.57.95.58.196.006.39-.04.56-.134l15.654-8.513c.54-.293.74-.97.446-1.51-.223-.41-.273-.884-.14-1.332.13-.448.43-.818.84-1.04.54-.295.74-.972.447-1.512zm-26.41 5.637c.457-.556.67-1.256.6-1.972-.072-.715-.417-1.36-.972-1.816-.068-.056-.078-.156-.022-.224L23.27 11.64c.055-.068.157-.076.222-.023.74.608 1.76.776 2.657.438.44-.165.83-.446 1.13-.81.054-.07.157-.076.223-.023l5.384 4.418c.068.056.078.156.022.223-.457.556-.67 1.256-.598 1.97.07.717.415 1.362.97 1.817.068.056.078.156.023.224L22.058 33.58c-.055.068-.157.076-.223.022-.74-.608-1.76-.775-2.657-.437-.44.165-.83.446-1.13.81-.055.068-.157.076-.223.023L12.44 29.58c-.068-.056-.078-.156-.022-.223zm21.522-2.97c.08.15.025.34-.126.423l-8.978 4.882 7.21-8.787 1.893 3.482zm3.985-1.994c-.635.345-1.097.917-1.3 1.61-.206.692-.13 1.424.216 2.058.043.078.015.175-.062.217L21.125 36.79c-.077.042-.175.01-.216-.064-.462-.847-1.346-1.388-2.31-1.412-.472-.012-.942.1-1.36.328-.076.043-.174.01-.215-.064l-.99-1.82 1.188.975c.305.25.724.32 1.094.18.18-.07.342-.184.465-.334.194-.237.447-.42.73-.526.582-.22 1.24-.11 1.72.283.306.25.725.32 1.095.18.18-.068.342-.183.466-.333l.433-.53L34.27 27.65c.298-.163.514-.43.61-.755.096-.324.06-.666-.102-.963L32.7 22.11l1.34-1.633c.387-.473.318-1.172-.154-1.56-.214-.175-.372-.396-.48-.64.357-.036.705-.14 1.023-.313.076-.042.174-.01.215.064l3.344 6.15c.04.077.012.173-.065.215z"></path></g></g></svg></span>            
                <span class="cat__text">Visit</span>
            </a>
            <a href="{{route('list', 'event')}}">
                <span class="cat__icon"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-12 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M18.48 12c-.397 0-.72.32-.72.722v2.396c0 .4.32.722.72.722h.48c.397 0 .72-.32.72-.722v-2.396c0-.4-.32-.722-.72-.722h-.48zm10.8 0c-.53 0-.96.43-.96.96v1.92c0 .53.43.96.96.96s.96-.43.96-.96v-1.92c0-.53-.43-.96-.96-.96zm-15.12 6.96v1.2H33.6v-1.2H14.16zm6.48-5.04v1.2h6.72v-1.2h-6.72zm10.56 0v1.2h3.6v18.72H13.2V15.12h3.6v-1.2H12v19.92c0 1.2 1.2 1.2 1.2 1.2h21.6s1.2 0 1.2-1.2V13.92h-4.8zm-2.15 12.374l-2.355 1.874c-.084.082-.123.2-.103.315l.82 2.848c.046.264-.163.477-.4.477-.062 0-.126-.014-.19-.047l-2.483-1.64c-.053-.027-.11-.04-.166-.04-.057 0-.114.013-.166.04l-2.484 1.64c-.062.033-.127.047-.19.047-.236 0-.445-.213-.4-.476l.82-2.847c.02-.116-.018-.233-.102-.315l-2.355-1.874c-.24-.236-.11-.645.225-.694l2.99-.08c.117-.017.217-.09.268-.194l1.03-2.84c.074-.15.218-.226.364-.226.145 0 .29.075.364.227l1.03 2.84c.05.103.15.176.266.193l2.99.08c.334.05.467.458.226.694z" fill="currentColor"></path></g></svg></span>            
                <span class="cat__text">Events</span>
            </a>
            <a href="{{route('list', 'services')}}">          
                <span class="cat__icon"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-12 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M31.183 35.904c-.957 0-1.894-.276-2.557-.934-1.02-1.014-1.395-2.514-1-3.908l-3.54-3.522-5.535 5.566c-.052.053-.135.116-.204.144l-4.53 1.875c-.212.087-.456.04-.618-.122l-.058-.057c-.158-.158-.21-.394-.132-.604l1.734-4.654c.11-.295.44-.444.733-.335.294.11.445.438.334.733l-1.314 3.525 3.308-1.368 5.874-5.91c.107-.107.252-.167.403-.167.14-.02.298.06.405.168l4.194 4.17c.16.16.21.398.13.607-.413 1.07-.17 2.27.62 3.052.544.54 1.42.682 2.274.572-.508-.33-.883-.648-.912-.67-1.125-1.116-1.015-2.607-.277-3.47l.05-.06.05-.05c.008-.005.014-.01.02-.017.852-.782 2.378-.933 3.492.175.04.046.37.43.707.94.107-.852-.04-1.73-.585-2.268-.79-.783-1.99-1.017-3.06-.596-.21.08-.448.032-.608-.126l-4.214-4.18c-.22-.218-.226-.575-.01-.798.038-.04.08-.072.125-.098l7.932-7.978c.026-.026.03-.054.03-.074 0-.02-.005-.05-.03-.075l-1.91-1.9c-.04-.04-.108-.042-.15 0l-8.033 8.08c-.11.11-.263.167-.41.17-.155-.003-.3-.067-.407-.18l-4.184-4.158c-.16-.16-.21-.398-.13-.608.412-1.07.17-2.27-.62-3.052-.545-.54-1.423-.68-2.274-.57.508.328.884.646.912.67 1.122 1.11 1.015 2.596.282 3.462-.017.024-.036.047-.056.068l-.05.05c-.026.027-.053.05-.082.07-.862.733-2.34.848-3.43-.23-.04-.045-.367-.428-.705-.94-.106.853.042 1.73.585 2.268.787.782 1.987 1.017 3.058.597.21-.083.45-.033.61.126l4.212 4.177c.22.22.226.576.01.8-.038.038-.08.07-.125.097l-2.807 2.825c-.22.223-.582.225-.805.003-.224-.222-.225-.583-.003-.806l2.51-2.526-3.545-3.514c-1.397.405-2.898.04-3.918-.972-1.22-1.21-1.147-3.363-.444-4.865.1-.214.323-.35.56-.326.237.02.438.182.504.41.195.677.886 1.578 1.137 1.87.622.614 1.442.524 1.888.11.41-.45.495-1.27-.157-1.918-.26-.22-1.17-.905-1.845-1.095-.228-.064-.393-.263-.414-.5-.02-.235.107-.46.32-.562 1.498-.715 3.65-.803 4.873.41 1.02 1.014 1.395 2.513 1 3.908l3.543 3.523 7.632-7.677c.484-.485 1.273-.488 1.76-.005l1.91 1.902c.237.234.367.548.367.88 0 .332-.127.645-.362.88L27.59 24.02l3.542 3.513c1.395-.404 2.9-.04 3.92.972 1.218 1.21 1.145 3.363.44 4.864-.1.214-.32.346-.56.325-.237-.018-.437-.182-.503-.41-.196-.676-.887-1.577-1.138-1.868-.622-.617-1.44-.525-1.888-.11-.41.45-.495 1.268.157 1.916.262.22 1.17.905 1.846 1.094.228.065.393.264.414.5.02.237-.108.46-.322.562-.684.327-1.507.524-2.315.524z" fill="currentColor"></path></g></svg></span>
                <span class="cat__text">Services</span>
            </a>
            <a href="{{route('list', 'travel')}}">
                <span class="cat__icon"><svg width="22" height="9" viewBox="0 0 22 9" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor" fill-rule="evenodd"><path d="M1.76 7.7H.13V5.156l.023-.084C.217 4.84.907 2.79 5.603 2.79c1.267 0 2.054-.64 2.814-1.26C9.097.976 9.802.404 10.763.404h5.46l2.386 1.654h3.32v4.388l-.245.196c-.118.095-1.186.923-2.356.923v-1.31c.452 0 .968-.26 1.29-.464V3.37H18.2l-2.385-1.655h-5.052c-.496 0-.947.368-1.52.833-.85.692-1.908 1.552-3.64 1.552-3.228 0-4.028 1.046-4.163 1.274V6.39h.32V7.7z"></path><path d="M4.044 8.845c-1.02 0-1.85-.83-1.85-1.85s.83-1.848 1.85-1.848 1.85.83 1.85 1.85-.83 1.848-1.85 1.848zm0-2.388c-.298 0-.54.242-.54.54 0 .297.242.54.54.54.297 0 .54-.243.54-.54 0-.298-.243-.54-.54-.54zM17.113 8.845c-1.02 0-1.85-.83-1.85-1.85s.83-1.848 1.85-1.848 1.85.83 1.85 1.85-.83 1.848-1.85 1.848zm0-2.388c-.298 0-.54.242-.54.54 0 .297.242.54.54.54.298 0 .54-.243.54-.54 0-.298-.242-.54-.54-.54zM6.237 6.34h8.615v1.31H6.237z"></path></g></svg></span>            
                <span class="cat__text">Travel</span>
            </a>
        </div>
    </div>

    <div class="section light-bg" id="features">
        <div class="container">
            <div class="section-title">
                <h3>Features you love</h3>
            </div>

            <div class="row">
                @foreach($packages as $package)
                    <div class="col-6 col-lg-3 package_list">
                        <a href="{{route('package-detail', $package->id)}}">
                            <div class="list_item">
                                <img src="{{asset('/images/'.$package->background_image)}}" alt="dual phone" height="200px">
                                <div class="description">
                                    <h4 class="card-title">{{$package->title}}</h4>
                                    <h5 class="card-title">{{$package->description}}</h5>
                                    <h5><i class="mdi mdi-map-marker"></i>{{$package->location}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- // end .section -->
    <div class="section">
        <div class="container">
            <div class="section-title">
                <h3>Best in Qatar</h3>
                <h6>Explore some of the best from around Qatar.</h6>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-6 col-lg-3 package_list">
                        <a href="{{route('package-detail', $package->id)}}">
                            <div class="list_item">
                                <img src="{{asset('/images/'.$package->background_image)}}" alt="dual phone" height="200px">
                                <div class="description">
                                    <h4 class="card-title">{{$package->title}}</h4>
                                    <h5 class="card-title">{{$package->description}}</h5>
                                    <h5><i class="mdi mdi-map-marker"></i>{{$package->location}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <div class="section light-bg">
        <div class="container">
            <div class="section-title">
                <h3>Latest Posts</h3>
                <h6>Fresh articles from the blog</h6>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-6 col-lg-3 package_list">
                        <a href="{{route('package-detail', $package->id)}}">
                            <div class="list_item">
                                <img src="{{asset('/images/'.$package->background_image)}}" alt="dual phone" height="200px">
                                <div class="description">
                                    <h4 class="card-title">{{$package->title}}</h4>
                                    <h5 class="card-title">{{$package->description}}</h5>
                                    <h5><i class="mdi mdi-map-marker"></i>{{$package->location}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <div class="section" id="gallery">
        <div class="container">
            <div class="section-title">
                <small>GALLERY</small>
                <h3>App Screenshots</h3>
            </div>

            <div class="img-gallery owl-carousel owl-theme">
                <img src="images/screen1.jpg" alt="image">
                <img src="images/screen2.jpg" alt="image">
                <img src="images/screen3.jpg" alt="image">
                <img src="images/screen1.jpg" alt="image">
            </div>

        </div>

    </div>
    <!-- // end .section -->

    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">

                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>Download Anywhere</h2>
                <p class="tagline">Available for all major mobile and desktop platforms. Rapidiously visualize optimal ROI rather than enterprise-wide methods of empowerment. </p>
                <div class="my-4">

                    <a href="#" class="btn btn-light"><img src="images/appleicon.png" alt="icon"> App Store</a>
                    <a href="#" class="btn btn-light"><img src="images/playicon.png" alt="icon"> Google play</a>
                </div>
                <p class="text-primary"><small><i>*Works on iOS 10.0.5+, Android Kitkat and above. </i></small></p>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> 1485 NY 11216 Qatar</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:support@mobileapp.com">support@qatarzap.com</a>
                        </p>
                    </div>
                    <div class="d-block d-sm-inline-block">
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">518-3636-2800</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function initMap() {
        var input = document.getElementById('searchloc');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setComponentRestrictions(
        {'country': ['qa']});
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            $("#lat").val(lat);
            $("#lng").val(lng)
        });
    }
</script>
    @include('layouts.footer')