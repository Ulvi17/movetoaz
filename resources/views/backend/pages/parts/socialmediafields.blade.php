<div class="row my-3">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Facebook</label>
            <input type="url"
                value="{{ old('facebook', isset($data) && !empty($data) && isset($data['facebook']) && !empty($data['facebook']) ? $data['facebook'] : null) }}"
                name="facebook"
                class="form-control {{ $errors->first('facebook') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Twitter</label>
            <input type="url"
                value="{{ old('twitter', isset($data) && !empty($data) && isset($data['twitter']) && !empty($data['twitter']) ? $data['twitter'] : null) }}"
                name="twitter"
                class="form-control {{ $errors->first('twitter') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Linkedin</label>
            <input type="url"
                value="{{ old('linkedin', isset($data) && !empty($data) && isset($data['linkedin']) && !empty($data['linkedin']) ? $data['linkedin'] : null) }}"
                name="linkedin"
                class="form-control {{ $errors->first('linkedin') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Instagram</label>
            <input type="url"
                value="{{ old('instagram', isset($data) && !empty($data) && isset($data['instagram']) && !empty($data['instagram']) ? $data['instagram'] : null) }}"
                name="instagram"
                class="form-control {{ $errors->first('instagram') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Tiktok</label>
            <input type="url"
                value="{{ old('tiktok', isset($data) && !empty($data) && isset($data['tiktok']) && !empty($data['tiktok']) ? $data['tiktok'] : null) }}"
                name="tiktok"
                class="form-control {{ $errors->first('tiktok') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Telegram</label>
            <input type="url"
                value="{{ old('telegram', isset($data) && !empty($data) && isset($data['telegram']) && !empty($data['telegram']) ? $data['telegram'] : null) }}"
                name="telegram"
                class="form-control {{ $errors->first('telegram') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Telefon</label>
            <input type="text"
                value="{{ old('phone', isset($data) && !empty($data) && isset($data['phone']) && !empty($data['phone']) ? $data['phone'] : null) }}"
                name="phone"
                class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Whatsapp</label>
            <input type="text"
                value="{{ old('whatsapp', isset($data) && !empty($data) && isset($data['whatsapp']) && !empty($data['whatsapp']) ? $data['whatsapp'] : null) }}"
                name="whatsapp"
                class="form-control {{ $errors->first('whatsapp') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Mobil</label>
            <input type="text"
                value="{{ old('mobile', isset($data) && !empty($data) && isset($data['mobile']) && !empty($data['mobile']) ? $data['mobile'] : null) }}"
                name="mobile"
                class="form-control {{ $errors->first('mobile') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Email</label>
            <input type="email"
                value="{{ old('email', isset($data) && !empty($data) && isset($data['email']) && !empty($data['email']) ? $data['email'] : null) }}"
                name="email"
                class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Google Maps</label>
            <input type="url"
                value="{{ old('maps_google', isset($data) && !empty($data) && isset($data['maps_google']) && !empty($data['maps_google']) ? $data['maps_google'] : null) }}"
                name="maps_google"
                class="form-control {{ $errors->first('maps_google') ? 'is-invalid' : '' }}">
        </div>
    </div>
</div>