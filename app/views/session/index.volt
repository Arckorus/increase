{{ form('session/start', 'role': 'form') }}
<fieldset>
    <div class="form-group">
        <label for="mail">Mail</label>
        <div class="controls">
            {{ text_field('mail', 'class': "form-control") }}
        </div>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <div class="controls">
            {{ password_field('password', 'class': "form-control") }}
        </div>
    </div>
    <div class="form-group">
        {{ submit_button('Connexion', 'class': 'btn btn-default') }}
    </div>
</fieldset>
</form>