<div class="row">
    <div class="span12">
        <?php echo $error;?>

        <?php echo form_open_multipart(base_url('welcome/do_upload'));?>
        <label>Choose File</label>
        <input type="file" name="userfile" size="20"/>

        <br/><br/>

        <input class="btn" type="submit" value="upload"/>

        </form>
    </div>
</div>