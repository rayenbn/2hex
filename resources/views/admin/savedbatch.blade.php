@extends('admin.layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper row admin-content">
        <div class="col-lg-12 filter_content">
            <div class="col-lg-6">
                <form method="POST" action="" id="filter_form">
                    {{ csrf_field() }}
                    <p>Select User by Email</p>
                    <input class="filter_email" name="filter_email" id="filter_email">
                </form>
            </div> 
        </div>
        <div class="col-lg-12">
            <div class="form-group m-form__group row">
                <div class="col-12 ml-auto">
                    <h3 class="m-form__section">Saved Batches</h3>
                </div>

                <table class="table table-striped- table-bordered table-hover table-checkable table-responsive table-sm">
                    <thead style="background-color: #52a3f0; color: white;">
                    <tr>

                        <th>Select</th>
                        <th>Name</th>
                        <th>Preview</th>
                        <th>Films Made:</th>
                        <th>QTY</th>
                        <th>Size</th>
                        <th>Preview Name</th>
                        <th>Artwork Name</th>
                        <th>Color QTY</th>
                        <th>Pantone Colors</th>
                        <th>Transp.</th>
                        <th>Edit</th>
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <label class="m-checkbox">
                                    <input id="closeButton" type="checkbox" value="checked" />
                                    <span></span>
                                </label>
                            </td>
                            <td>Surfer Bail</td>
                            <td>
                                <img src="/img/surfer.png" width="200en">
                            </td>
                            <td>
                                Paid:
                                2019/10/06
                            </td>
                            <td>60</td>
                            <td>9"x33"</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                P289765
                                P536789
                                P56HU79
                            </td>
                            <td>No</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>
                                <label class="m-checkbox">
                                    <input id="closeButton" type="checkbox" value="checked" />
                                    <span></span>
                                </label>
                            </td>
                            <td>Fish Drowne</td>
                            <td>
                                <img src="/img/fish.png" width="200en">
                            </td>
                            <td>Not yet made</td>
                            <td>150</td>
                            <td>9"x33"</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                P289765
                                P536789
                                P56HU79
                            </td>
                            <td>No</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>
                            <label class="m-checkbox">
                                <input id="closeButton" type="checkbox" value="checked" />
                                <span></span>
                            </label>
                            </td>
                            <td>Shark Can</td>
                            <td>
                                <img src="/img/shark.png" width="200en">
                            </td>
                            <td>Not yet made</td>
                            <td>100</td>
                            <td>9"x33"</td>
                            <td>-</td>
                            <td></td>
                            <td>-</td>
                            <td>
                                P289765
                                P536789
                                P56HU79
                            </td>
                            <td>Yes</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>
                                <label class="m-checkbox">
                                    <input id="closeButton" type="checkbox" value="checked" />
                                    <span></span>
                                </label>
                            </td>
                            <td>Shark Can</td>
                            <td>
                                <img src="/img/shark.png" width="200en">
                            </td>
                            <td>Not yet made</td>
                            <td>70</td>
                            <td>9"x33"</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                P289765
                                P536789
                                P56HU79
                            </td>
                            <td>Yes</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
                <a href="skateboard-deck-configurator/" class="btn btn-outline-info">Add to Summary</a>
                &nbsp &nbsp
                <a href="skateboard-remove/" class="btn btn-outline-danger">Delete</a>
            </div>
        </div>
        
    </div>
@endsection
