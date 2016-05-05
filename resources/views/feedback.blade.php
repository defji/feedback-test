@extends('app')
@section('concent')
<article>
    {{--@TODO http://blog.yodersolutions.com/bootstrap-form-validation-done-right-in-angularjs/?utm_source=github&utm_medium=readme&utm_campaign=code--}}
    <div class="container" style="padding-top: 5em" ng-controller="FeedbackCtrl">
        <div class="help-block" ng-messages="feedbackForm.username.$error" ng-if="feedbackForm.username.$touched">
            <p ng-message="minlength" class="alert alert-danger">A felhasználónévnek legalább három karakter kell, hogy legyen!</p>
            <p ng-message="maxlength" class="alert alert-danger">A felhasználónév túl hosszú!</p>
            <p ng-message="required" class="alert alert-danger">A felhasználónév megadása kötelező!</p>
            <p ng-message="registrationForm.confirmPassword.$error">A két jelszó nem egyezik meg</p>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Panel heading without title</div>
            <div class="panel-body">

                <form name="feedbackForm">
                    <div class="form-group col-md-6"  show-errors>

                        <label for="username" class="control-label">Felhasználónév</label>
                        <input type="text" class="form-control" name="username"
                               ng-model="feedback.username"
                               ng-required="true"
                               ng-minlength="5"
                               ng-maxlength="20">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="control-label">E-mail cím</label>
                        <input type="email" class="form-control" name="email"
                               ng-model="feedback.email"
                               ng-required="true"
                               ng-email="true">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password" class="control-label">Jelszó</label>
                        <input type="password" name="password" class="form-control"
                               ng-model="feedback.password"
                               ng-required="true">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password" class="control-label">Jelszó ismét</label>
                        <input type="password" name="confirmPassword" class="form-control"
                               ng-model="eedback.confirmPassword"
                               ng-required="true"
                               compare-to="feedback.password" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Felhasznánás jellege</label>
                        <div class="radio">
                            <label><input type="radio" name="plan">Üzleti</label>
                            <label><input type="radio" name="plan">Magán</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Hol hallott rólunk?</label>
                        <select name="interest" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Születési dátum</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary" ng-click="save()">Elküldöm</button>
                    </div>
                </form>
            </div>
        </div>
    <pre>
        @{{ feedback  }}
        @{{ feedbackForm.password.$valid}}
    </pre>
    </div>
</article>
@stop