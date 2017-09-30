<p><strong>Created On: </strong> <?php echo date('m/d/Y h:i a',strtotime($form->getObject()->getCreatedAt()))?></p>
<p><strong>Updated On: </strong> <?php echo date('m/d/Y h:i a',strtotime($form->getObject()->getUpdatedAt()))?></p>
<p><strong>Last Login On: </strong> <?php echo date('m/d/Y h:i a',strtotime($form->getObject()->getLastLogin()))?></p>