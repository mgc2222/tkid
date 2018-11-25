<!--Start Book Table-->
<div id="book-table"></div>
<div class="height35"></div>
<div class="book-table">
    <div class="parallax parallax-book-table">
        <div class="detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-title">
                            <span>Book a Table</span>
                            <h1>Reservation</h1>
                        </div>
                        <div class="booking-form">
                            <p class="error" id="reserv_error" style="display:none;"></p>
                            <p class="success" id="reserv_success_msg" style="display:none;">Thank You! We will contact you shortly.</p>
                            <form name="reserv_form" id="reserv_form" method="post" onSubmit="return false">
                                <div class="col-md-6">
                                    <div class="field"><input name="reserv_name" id="reserv_name" type="text" value="Your Name" onblur="if(this.value == '') { this.value='Your Name'}" onfocus="if (this.value == 'Your Name') {this.value=''}" ></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <input type="text" id="datepicker"  placeholder="Appointment Date" onClick="" name="datepicker" value="Choose A Date" onblur="if(this.value == '') { this.value='Choose A Date'}" onfocus="if (this.value == 'Choose A Date') {this.value=''}"/>    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field basic-example2">
                                        <select class="basic-example" id="reserv_time" name="reserv_time">
                                            <option value="">Choose A Time</option>
                                            <option value="9:00am to 12:00pm">9:00am to 12:00pm</option>
                                            <option value="12:00pm to 3:00pm">12:00pm to 3:00pm</option>
                                            <option value="3:00pm to 6:00pm">3:00pm to 6:00pm</option>
                                            <option value="6:00pm to 9:00pm">6:00pm to 9:00pm</option>
                                            <option value="9:00pm to 12:00am">9:00pm to 12:00am</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <select class="basic-example" name="reserv_persons" id="reserv_persons">
                                            <option value="">Persons</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field"><input name="reserv_email" id="reserv_email" type="text" value="Email Address" onblur="if(this.value == '') { this.value='Email Address'}" onfocus="if (this.value == 'Email Address') {this.value=''}"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field"><input name="reserv_phone" id="reserv_phone" type="text" value="Phone No" onblur="if(this.value == '') { this.value='Phone No'}" onfocus="if (this.value == 'Phone No') {this.value=''}"></div>
                                </div>
                                <input name=" " type="submit" value="Book a table" onClick="validateReservation();">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Book Table-->