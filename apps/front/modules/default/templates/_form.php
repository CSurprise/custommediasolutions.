<a id="Form"></a>
<h2>New Model/Actor Application Form</h2>
<form method="post" action="<?php echo url_for('default/submission#Form'); ?>" id="submission_form">
<?php echo $form->renderHiddenFields()?>

<table cellspacing="0" cellpadding="2" class="submission-form">
    <tbody><tr>
      <td>
      	<span class="required_field">*</span>
      	<?php echo $form['first_name']->renderLabel('First Name');?>
      </td>
      <td><?php echo $form['first_name']->render(array('class' => 'validate[required]'));?>
      <?php echo $form['first_name']->renderError();?>
      </td>
      <td><span class="required_field">*</span>
      <?php echo $form['age']->renderLabel('Age');?></td>
      <td><?php echo $form['age']->render(array('size' => 2, 'class' => 'validate[required,onlyNumber]'));?>
      <?php echo $form['age']->renderError();?>
      </td>
    </tr>
    <tr>
      <td><span class="required_field">*</span>
      <?php echo $form['last_name']->renderLabel('Last Name');?>
      </td>
      <td><?php echo $form['last_name']->render(array('class' => 'validate[required]'));?>
      <?php echo $form['last_name']->renderError();?>
      </td>
      <td><span class="required_field">*</span>
      <?php echo $form['gender']->renderLabel('Gender');?>
      </td>
      <td><?php echo $form['gender']->render(array('class' => 'validate[required]'));?>
      <?php echo $form['gender']->renderError();?>
      </td>
    </tr>
    <tr>
      <td colspan="2"><div><span class="required_field">* only one contact number required</span></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $form['phone']->renderLabel('Phone');?></td>
      <td>
   	  <?php echo $form['phone']->render();?><?php echo $form['phone']->renderError();?></td>
      <td><?php echo $form['height']->renderLabel('Height');?></td>
      <td><?php echo $form['height']->render(array('class' => 'validate[onlyNumber]'));?></td>
    </tr>
    <tr>
      <td><?php echo $form['cell']->renderLabel('Cell Phone');?></td>
      <td><?php echo $form['cell']->render(array('class' => 'validate[onlyNumber]'));?><?php echo $form['cell']->renderError();?></td>
      <td><?php echo $form['weight']->renderLabel('Weight');?></td>
      <td><?php echo $form['weight']->render();?></td>
    </tr>
    <tr>
      <td><span class="required_field">*</span>
      <?php echo $form['email']->renderLabel('E-Mail');?>
      </td>
      <td><?php echo $form['email']->render(array('class' => 'validate[required,email]'));?>
      <?php echo $form['email']->renderError();?>
      </td>
      <td><?php echo $form['interests']->renderLabel('Interests');?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $form['address']->renderLabel('Address');?></td>
      <td><?php echo $form['address']->render();?><?php echo $form['address']->renderError();?></td>
      <td valign="top" style="padding-left: 15px;" rowspan="4" colspan="2">
      <?php echo $form['interests']->render();?>
      <?php echo $form['interests']->renderError();?>
      </td>
    </tr>
    <tr>
      <td><?php echo $form['city']->renderLabel('City');?>
        ,
      <?php echo $form['state']->renderLabel('State');?></td>
      <td><?php echo $form['city']->render(array('size' => 10));?>
        , <?php echo $form['state']->render(array('class' => 'validate[required]'));?>
        <?php echo $form['state']->renderError();?>
        <?php echo $form['city']->renderError();?>
        </td>
    </tr>
    <tr>
      <td><?php echo $form['zipcode']->renderLabel('Zip Code');?></td>
      <td><?php echo $form['zipcode']->render(array('size' => 8));?><?php echo $form['zipcode']->renderError();?></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><h3>Additional Information / Comments</h3></td>
    </tr>
    <tr>
      <td colspan="4"><?php echo $form['comments']->render()?></td>
    </tr>
    <tr>
      <td colspan="4"><div align="right">
          <input type="submit" value="Submit" name="submit">
        </div></td>
    </tr>
  </tbody>
  </table>
 </form>