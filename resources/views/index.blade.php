@extends('layouts.master')
@section('containerHeader')
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"></ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .nav-pills .nav-item .nav-link.active {
            background-color: #394867;
            color: #fff;
        }
        .nav-pills .nav-item .nav-link:hover {
            color: #000;
        }
    </style>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card" style="background-color: #EEEEEE;">
                <div class="card-header d-flex justify-content-center p-0">
                    <h3 class="card-title p-3"></h3>
                    <ul class="nav nav-pills mx-auto p-2">
                        <li class="nav-item"><a onclick="showTab('url');" class="nav-link active" href="#url" data-toggle="tab">URL</a></li>
                        <li class="nav-item"><a onclick="showTab('phone');" class="nav-link" href="#phone" data-toggle="tab">PHONE</a></li>
                        <li class="nav-item"><a onclick="showTab('email');" class="nav-link" href="#email" data-toggle="tab">EMAIL</a></li>
                        <li class="nav-item"><a onclick="showTab('sms');" class="nav-link" href="#sms" data-toggle="tab">SMS</a></li>
                        <li class="nav-item"><a onclick="showTab('vcard');" class="nav-link" href="#vcard" data-toggle="tab">VCARD</a></li>
                        <li class="nav-item"><a onclick="showTab('mecard');" class="nav-link" href="#mecard" data-toggle="tab">MECARD</a></li>
                        <li class="nav-item"><a onclick="showTab('wifi');" class="nav-link" href="#wifi" data-toggle="tab">WIFI</a></li>
                        <li class="nav-item"><a onclick="showTab('whatsapp');" class="nav-link" href="#whatsapp" data-toggle="tab">WHATSAPP</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-12 col-md-7 mx-auto">
                                <div style="display: none" class="tab-pane" id="url">
                                    <div class="form-group">
                                    <label for="input_url">Your URL</label>
                                        <input type="text" class="form-control" name="url[url]"
                                               placeholder="https://qrlinkportal.com">
                                    </div>
                                </div>
                                <div style="display: none" class="tab-pane" id="phone">
                                    <div class="form-group">
                                        <label for="input_phone">Your Phone Number</label>
                                        <input type="text" class="form-control" name="phone[phone]"
                                               placeholder="+90 530 799...">
                                    </div>
                                </div>
                                <div style="display: none" class="tab-pane" id="email">
                                    <div class="form-group">
                                        <label for="input_phone">Your Email</label>
                                        <input type="text" class="form-control" name="email[email]"
                                               placeholder="info@qrlinkportal.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_phone">Subject</label>
                                        <input type="text" class="form-control" name="email[subject]"
                                               placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_phone">Message</label>
                                        <input type="text" class="form-control" name="email[message]"
                                               placeholder="Hi, I am ...">
                                    </div>
                                </div>
                                <div style="display: none" class="tab-pane" id="sms">
                                    <div class="form-group">
                                        <label for="input_phone">Your Phone Number</label>
                                        <input type="text" class="form-control" name="sms[phone]"
                                               placeholder="+90 530 799...">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_phone">Your Message</label>
                                        <input type="text" class="form-control" name="sms[message]"
                                               placeholder="Hi, I am ...">
                                    </div>
                                </div>
                                <div style="display: none" class="tab-pane" id="vcard">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Firstname <small class="required">(required
                                                        *)</small></label>
                                                <input type="text" class="form-control" name="vcard[firstname]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Lastname <small class="required">(required
                                                        *)</small></label>
                                                <input type="text" class="form-control" name="vcard[lastname]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Organization</label>
                                                <input type="text" class="form-control" name="vcard[organization]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Position (Work)</label>
                                                <input type="text" class="form-control" name="vcard[position_work]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Phone (Work)</label>
                                                <input type="text" class="form-control" name="vcard[phone_work]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Phone (Private)</label>
                                                <input type="text" class="form-control" name="vcard[phone_private]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Phone (Mobile) <small class="required">(required
                                                        *)</small></label>
                                                <input type="text" class="form-control" name="vcard[phone_mobile]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Fax (Work)</label>
                                                <input type="text" class="form-control" name="vcard[fax_work]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Fax (Private)</label>
                                                <input type="text" class="form-control" name="vcard[fax_private]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Email</label>
                                                <input type="text" class="form-control" name="vcard[email]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Website</label>
                                                <input type="text" class="form-control" name="vcard[website]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Street</label>
                                                <input type="text" class="form-control" name="vcard[street]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Zipcode</label>
                                                <input type="text" class="form-control" name="vcard[zipcode]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">City</label>
                                                <input type="text" class="form-control" name="vcard[city]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">State</label>
                                                <input type="text" class="form-control" name="vcard[state]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Country</label>
                                                <input type="text" class="form-control" name="vcard[country]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label>Version</label>
                                                <select name="vcard[version]" class="form-control">
                                                    <option value="3.0" selected>Version 3</option>
                                                    <option value="2.1">Version 2.1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="tab-pane" id="mecard">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Firstname</label>
                                                <input type="text" class="form-control" name="mecard[firstname]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Lastname</label>
                                                <input type="text" class="form-control" name="mecard[lastname]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Nickname</label>
                                                <input type="text" class="form-control" name="mecard[nickname]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Phone 1</label>
                                                <input type="text" class="form-control" name="mecard[phone_1]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Phone 2</label>
                                                <input type="text" class="form-control" name="mecard[phone_2]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Phone 3</label>
                                                <input type="text" class="form-control" name="mecard[phone_3]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Email</label>
                                                <input type="text" class="form-control" name="mecard[email]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Website</label>
                                                <input type="text" class="form-control" name="mecard[website]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Birthday</label>
                                                <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                       name="mecard[birthday]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Street</label>
                                                <input type="text" class="form-control" name="mecard[street]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Zipcode</label>
                                                <input type="text" class="form-control" name="mecard[zipcode]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">City</label>
                                                <input type="text" class="form-control" name="mecard[city]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">State</label>
                                                <input type="text" class="form-control" name="mecard[state]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Country</label>
                                                <input type="text" class="form-control" name="mecard[country]">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="input_phone">Notes</label>
                                                <input type="text" class="form-control" name="mecard[notes]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="tab-pane" id="wifi">
                                    <div class="form-group">
                                        <label for="input_phone">Wireless SSID</label>
                                        <input type="text" class="form-control" name="wifi[ssid]"
                                               placeholder="Wireless SSID">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_phone">Password</label>
                                        <input type="text" class="form-control" name="wifi[password]"
                                               placeholder="Password">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Encryption</label>
                                            <select name="wifi[encryption]" class="form-control">
                                                <option value="" selected>No Encryption</option>
                                                <option value="WEP">WEP</option>
                                                <option value="WPA">WPA/WPA2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="tab-pane" id="whatsapp">
                                    <div class="form-group">
                                        <label for="input_phone">Your Phone Number</label>
                                        <input type="text" class="form-control" name="whatsapp[phone]"
                                               placeholder="+90 530 799...">
                                    </div>
                                    <div class="form-group">
                                        <label for="input_phone">Message</label>
                                        <input type="text" class="form-control" name="whatsapp[message]"
                                               placeholder="Hi, I am ...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-1"></div>
                            <div class="col-12 col-md-4">
                                <div class="results">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="qr-image-show">
                                                <img id="qr_image" src="{{ asset('dist/img/default-qr.svg') }}" alt="default-qr">
                                            </div>
                                            <button class="btn btn-success disabled" id="qr_button"  style="width: 100%; margin-top: 10px;">Download QR</button>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="short_url_panel" class="row">
                                        <div class="col-12">
                                            <h4>Short URL</h4>
                                            <input class="form-control" id="link_input" disabled type="text" value="https://qrlinkportal.com/q/ABCD">
                                            <button class="btn btn-dark" id="link_button" onclick="copyInput('link_input')" disabled style="width: 100%; margin-top: 10px;">Copy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <br>
                            <button style="width: 100%" type="submit" onclick="generateShortURL()"
                                    class="btn btn-dark">Generate Short URL
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function () {
                showTab('url');
            });
        </script>
    @endpush
@endsection
