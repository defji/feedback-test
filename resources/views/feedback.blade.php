@extends('app')
@section('concent')
<article>
    {{--@TODO http://blog.yodersolutions.com/bootstrap-form-validation-done-right-in-angularjs/?utm_source=github&utm_medium=readme&utm_campaign=code--}}
    <div class="container" style="padding-top: 5em" ng-controller="FeedbackCtrl">
        <div class="panel panel-primary">
            <div class="panel-heading">Panel heading without title</div>
            <div class="panel-body">

                <form name="feedbackForm" novalidate>
                    <div class="form-group col-md-6"  ng-class="{ 'has-error': feedbackForm.username.$touched && feedbackForm.username.$invalid }">

                        <label for="username" class="control-label">Felhasználónév</label>
                        <input type="text" name="username" class="form-control"
                               ng-model="feedback.username"
                               ng-minlength="3"
                               ng-maxlength="72"
                               required>
                        <div class="help-block" ng-messages="feedbackForm.username.$error" ng-if="feedbackForm.username.$touched">
                            <p ng-message="minlength">A felhasználónév túl rövid!</p>
                            <p ng-message="maxlength">A felhasználónév túl hosszú!</p>
                            <p ng-message="required">A felhasználónév megadása kötelező!</p>
                        </div>

                    </div>
                    <div class="form-group col-md-6" ng-class="{ 'has-error': feedbackForm.email.$touched && feedbackForm.email.$invalid }">
                        <label for="email" class="control-label">E-mail cím</label>
                        <input type="email" class="form-control"
                               name="email"
                               ng-model="feedback.email"
                               required>
                        <div class="help-block" ng-messages="feedbackForm.email.$error" ng-if="feedbackForm.email.$touched">
                            <p ng-message="email">Valós e-mail címet adjon meg!</p>
                            <p ng-message="required">Az e-mail cím megadása kötelező!</p>
                            <p ng-message="required">Az e-mail cím megadása kötelező!</p>
                        </div>

                    </div>
                    <div class="form-group col-md-6" ng-class="{ 'has-error': feedbackForm.password.$touched && feedbackForm.password.$invalid }">
                        <label for="password" class="control-label">Jelszó</label>
                        <input type="password" name="password" class="form-control"
                               ng-model="feedback.password"
                               ng-minlength="5"
                               required>
                        <div class="help-block" ng-messages="feedbackForm.password.$error" ng-if="feedbackForm.password.$touched">
                            <p ng-message="compareTo">A két jelszó nem egyezik meg</p>
                            <p ng-message="minlength">A jelszó túl rövid!</p>
                            <p ng-message="required">A jelszó megadása kötelező!</p>
                        </div>

                    </div>
                    <div class="form-group col-md-6" ng-class="{ 'has-error': feedbackForm.confirmPassword.$touched && feedbackForm.confirmPassword.$invalid }">
                        <label for="password" class="control-label">Jelszó ismét</label>
                        <input type="password" name="confirmPassword" class="form-control"
                               ng-model="feedback.confirmPassword"
                               ng-minlength="5"
                               ng-required="true"
                               compare-to="feedback.password" />
                        <div class="help-block" ng-messages="feedbackForm.confirmPassword.$error">
                            <p ng-message="compareTo">A két jelszó nem egyezik meg</p>
                            <p ng-message="minlength">A jelszó túl rövid!</p>
                            <p ng-message="required">A megismételt jelszó megadása kötelező!</p>
                        </div>

                    </div>
                    <div class="form-group col-md-6" ng-class="{ 'has-error': feedbackForm.plan.$touched && feedbackForm.plan.$invalid }">
                        <label>Felhasznánás jellege</label>
                        <div class="radio">
                            <label><input type="radio" name="plan" value="business" ng-model="feedback.plan" ng-required="!feedback.plan">Üzleti</label>
                            <label><input type="radio" name="plan" value="personal" ng-model="feedback.plan" ng-required="!feedback.plan">Magán</label>
                        </div>
                        <div class="help-block" ng-messages="feedbackForm.plan.$error" ng-if="feedbackForm.plan.$touched">
                            <p ng-message="required">Válassza ki a felhasználás jellegét!</p>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Hol hallott rólunk?</label>
                        <select name="interest" class="form-control">
                            <option  ng-repeat="interest in interests" value="@{{ interest }}">@{{ interest }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6" ng-class="{ 'has-error': feedbackForm.dob.$touched && feedbackForm.dob.$invalid }">
                        <label>Születési dátum</label>
                        <input type="date" class="form-control"
                               name="dob"
                               ng-model="feedback.dob"
                               required
                               age-check>
                        <div class="help-block" ng-messages="feedbackForm.dob.$error" ng-if="feedbackForm.dob.$touched">
                            <p ng-message="invalidDob">Az életkor nem lehet kevesebb mint 18!</p>
                            <p ng-message="required">A születési dátum megadása kötelező!</p>
                        </div>

                    </div>
                    <div class="form-group col-md-12" ng-class="{ 'has-error': feedbackForm.law.$touched && feedbackForm.law.$invalid }">
                            <label><input type="checkbox" ng-model="feedback.law" name="law" ng-model="feedback" required> Elfogadom a felhasználási feltételeket</label>
                            <div class="help-block" ng-messages="feedbackForm.law.$error" ng-if="feedbackForm.law.$touched">
                                <p ng-message="required">A felhasználási feltételek elfogadása kötelező!</p>
                            </div>

                    </div>
                    <div class="col-md-12">
                        <button type="submit" ng-disabled="feedbackForm.$invalid" class="btn btn-lg btn-primary">Elküldöm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>
@stop