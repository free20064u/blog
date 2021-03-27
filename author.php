<?php
    require_once 'partials/connection.php';
    include_once 'partials/header.php';
?>

<div id="banner-wrapper">
	<div id="banner" class="box container">
		<div class="row">
			<div class="col-12 col-12-medium">
                <form>
                    <fieldset class="form-group">
                        <label>Text Label</label>
                            <input type="text" class="form-control" placeholder="Enter Text">
                            <small class="text-muted">This is some help text.</small>
                        <label>Select dropdown</label>
                            <select class="form-control">
                                <option>one</option>
                                <option>two</option>
                                <option>three</option>
                                <option>four</option>
                                <option>five</option>
                            </select>
                        <label>Textarea</label>
                            <textarea class="form-control" rows="3"></textarea>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
			</div>
		</div>
	</div>
</div>

<?php
    include_once 'partials/footer.php';
?>