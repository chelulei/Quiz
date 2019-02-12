<section class="header header-inverse pt-100" style="background-color: #197cbf;">
    <div class="container">
        <br/>
        <div class="row justify-content-center pb-50">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="card card-sm" action="{{ route('questions') }}">
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                        </div>
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless"  value="{{ request('term') }}" name="term" type="search" placeholder="Search questions or keywords">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="submit">Search</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
    </div>
</section>