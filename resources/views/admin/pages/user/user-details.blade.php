@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <header class="page-header">
        <h2>User Details</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/">
                        <i class="fa fa-home"></i> Dashboard
                    </a>
                </li>
                <li><span>title</span></li>
            </ol>
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class=""></i></a>
        </div>
    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">

            </div>
            <h2 class="panel-title">title</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <h3><b>Profile Basic Details --------</b></h3>
                    <ul>
                        <li>
                            <h4><b>First Name :</b>&nbsp;
                                @isset($users_details->first_name)
                                    <span>{{ $users_details->first_name }}</span>
                                @endisset
                            </h4>
                        </li>
                        <li>
                            <h4><b>Last Name :</b>&nbsp;
                                @isset($users_details->last_name)
                                <span>{{ $users_details->last_name }}</span>
                            @endisset</h4>

                        </li>
                        <li>
                            <h4><b>Age :</b>&nbsp;
                                @isset($users_details->age)
                                <span>{{ $users_details->age }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Height :</b>&nbsp;
                                @isset($profile_basic_details->height)
                                <span>{{ $profile_basic_details->height }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Weight :</b>&nbsp;
                                @isset($profile_basic_details->weight)
                                <span>{{ $profile_basic_details->weight }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Marital Status :</b>&nbsp;
                                @isset($profile_basic_details->marital_status)
                                <span>{{ $profile_basic_details->marital_status }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Mother Tongue :</b>&nbsp;
                                @isset($profile_basic_details->mother_tongue)
                                <span>{{ $profile_basic_details->mother_tongue }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Physical Status :</b>&nbsp;
                                @isset($profile_basic_details->physical_status)
                                <span>{{ $profile_basic_details->physical_status }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Body Type :</b>&nbsp;
                                 @isset($profile_basic_details->body_type)
                                <span>{{ $profile_basic_details->body_type }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Gender :</b>&nbsp;
                                 @isset($profile_basic_details->gender)
                                <span>{{ $profile_basic_details->gender }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Eating Habits :</b>&nbsp;
                                @isset($profile_basic_details->eating_habits)
                                <span>{{ $profile_basic_details->eating_habits }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Profile Created By :</b>&nbsp;
                                @isset($profile_basic_details->profile_created_by)
                                <span>{{ $profile_basic_details->profile_created_by }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Smoking Habits :</b>&nbsp;
                                @isset($profile_basic_details->smoking_habits)
                                <span>{{ $profile_basic_details->smoking_habits }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Drinking Habits :</b>&nbsp;
                                @isset($profile_basic_details->drinking_habits)
                                <span>{{ $profile_basic_details->drinking_habits }}</span>
                            @endisset</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <h3><b>Religious Informations --------</b></h3>
                    <ul>
                        <li>
                            <h4><b>Caste : </b>&nbsp;
                                @isset($religious_informations->caste)
                                <span>{{ $religious_informations->caste }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Gotra :</b>&nbsp;
                                @isset($religious_informations->gotra)
                                <span>{{ $religious_informations->gotra }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Zodiac :</b>&nbsp;
                                @isset($religious_informations->zodiac)
                                <span>{{ $religious_informations->zodiac }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Star :</b>&nbsp;
                                @isset($religious_informations->star)
                                <span>{{ $religious_informations->star }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Rassi :</b>&nbsp;
                                @isset($religious_informations->rassi)
                                <span>{{ $religious_informations->rassi }}</span>
                            @endisset</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <h3><b>Location --------</b></h3>
                    <ul>
                        <li>
                            <h4><b>Country : </b>&nbsp;
                                @isset($locations->country)
                                <span>{{ $locations->country }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>City :</b>&nbsp;
                                @isset($locations->city)
                                <span>{{ $locations->city }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>State :</b>&nbsp;
                                @isset($locations->state)
                                <span>{{ $locations->state }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Citizenship :</b>&nbsp;
                                @isset($locations->citizenship)
                                <span>{{ $locations->citizenship }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Ancestral Origin :</b>&nbsp;
                                @isset($locations->ancestral_origin)
                                <span>{{ $locations->ancestral_origin }}</span>
                            @endisset</h4>
                        </li>
                    </ul>
                </div>&nbsp;
                <div class="col-lg-4 col-md-6 col-12">
                    <h3><b>Professional Informations -------</b></h3>
                    <ul>
                        <li>
                            <h4><b>Education Category : </b>&nbsp;
                                @isset($professional_informations->education_category)
                                <span>{{ $professional_informations->education_category }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>College :</b>&nbsp;
                                @isset($professional_informations->college)
                                <span>{{ $professional_informations->college }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Occupation :</b>&nbsp;
                                @isset($professional_informations->occupation)
                                <span>{{ $professional_informations->occupation }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Organization :</b>&nbsp;
                                @isset($professional_informations->organization)
                                <span>{{ $professional_informations->organization }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Employed In :</b>&nbsp;
                                @isset($professional_informations->employed_in)
                                <span>{{ $professional_informations->employed_in }}</span>
                            @endisset</h4>
                        </li>
                    </ul>
                </div>&nbsp;
                <div class="col-lg-4 col-md-6 col-12">
                    <h3><b>Family Details -------</b></h3>
                    <ul>
                        <li>
                            <h4><b> Family Values: </b>&nbsp;
                                @isset($family_details->family_values)
                                <span>{{ $family_details->family_values }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Family Type :</b>&nbsp;
                                @isset($family_details->family_type)
                                <span>{{ $family_details->family_type }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Family Status :</b>&nbsp;
                                @isset($family_details->family_status)
                                <span>{{ $family_details->family_status }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Father's Occupation :</b>&nbsp;
                                @isset($family_details->fathers_occupation)
                                <span>{{ $family_details->fathers_occupation }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b>Mother's Occupation :</b>&nbsp;
                                @isset($family_details->mothers_occupation)
                                <span>{{ $family_details->mothers_occupation }}</span>
                            @endisset</h4>
                        </li>
                    </ul>
                </div>&nbsp;
                <div class="col-lg-4 col-md-6 col-12">
                    <h3><b>Contact Details -------</b></h3>
                    <ul>
                        <li>
                            <h4><b> Contact Number: </b>&nbsp;
                                @isset($users_details->contact_number)
                                <span>{{ $users_details->contact_number }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b> Email: </b></h4>
                        </li>
                    </ul>
                </div>&nbsp;
                <div class="col-lg-4 col-md-6 col-12">
                    <h3><b>Hobbies & Interests -------</b></h3>
                    <ul>
                        <li>
                            <h4><b> Hobbies: </b>&nbsp;
                                @isset($hobbies->hobbies)
                                <span>{{ $hobbies->hobbies }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b> Music: </b>&nbsp;
                                @isset($hobbies->music)
                                <span>{{ $hobbies->music }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b> Reading: </b>&nbsp;
                                @isset($hobbies->reading)
                                <span>{{ $hobbies->reading }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b> Movies and Tv shows: </b>&nbsp;
                                @isset($hobbies->moving_and_tv_shows)
                                <span>{{ $hobbies->moving_and_tv_shows }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b> Sports and Fitness: </b>&nbsp;
                                @isset($hobbies->sports_and_fitness)
                                <span>{{ $hobbies->sports_and_fitness }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b> Food: </b>&nbsp;
                                @isset($hobbies->food)
                                <span>{{ $hobbies->food }}</span>
                            @endisset</h4>
                        </li>
                        <li>
                            <h4><b> Spoken Languages: </b>&nbsp;
                                @isset($hobbies->spoken_languages)
                                <span>{{ $hobbies->spoken_languages }}</span>
                            @endisset</h4>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <div class="row">
                <div class="form-group">
                    <label class="control-label required-s">Answer</label>
                    <textarea type="text" class="form-control" rows="5" name="answers" id="answers"></textarea>
                </div>
            </div> --}}

        </div>
    </section>
@endsection
