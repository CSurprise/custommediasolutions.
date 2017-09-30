<?php

require_once dirname(__FILE__).'/../lib/submissionsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/submissionsGeneratorHelper.class.php';

/**
 * submissions actions.
 *
 * @package    models
 * @subpackage submissions
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class submissionsActions extends autoSubmissionsActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	
    Doctrine::getTable('Submissions')->setUser($this->getUser());
  	
      // sorting
    if ($request->getParameter('sort'))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    // has filters? (usefull for activate reset button)
    $this->hasFilters = $this->getUser()->getAttribute('submissions.filters', $this->configuration->getFilterDefaults(), 'admin_module');

  	
  	if($request->hasParameter('sub_action'))
  	{
  		switch($request->getParameter('sub_action'))
  		{
  		case 'print':
  			$this->setTemplate('print_index');
  			$this->setLayout('print');
  			break;
  		case 'export':
  			if( ! file_exists(sfConfig::get('sf_cache_dir').'/csv'))
  			{
  				mkdir(sfConfig::get('sf_cache_dir').'/csv', 0777);
  			}
  			
  			$_filename = time().'.csv';
  			$filename = sfConfig::get('sf_cache_dir').'/csv/'.$_filename;
  			
  			$fp = fopen($filename, 'w');

	  		$submissions = $this->pager
              ->getQuery()
              ->limit(100000)
              ->offset(0)
              ->execute(array(), Doctrine_Core::HYDRATE_ARRAY); 
	  		  
	  		if(count($submissions) > 0)
	  		{
	  			$i=0;
	  			foreach($submissions as $submission )
	  			{
	  				if($i==0)
	  				{
	  					fputcsv($fp, array(
	  					'Submitted On',
	  					'Website',
	  					'First Name',
	  					'Last Name',
	  					'Age',
	  					'Gender',
	  					'Height',
	  					'Weight',
	  					'Phone',
	  					'Cell',
	  					'Email',
	  					'Address',
	  					'City',
	  					'State',
	  					'Zip Code',
	  					'Interests',
	  					'Comments'
	  					));
	  				}

	  				fputcsv($fp, array(
	  					$submission['created_at'],
	  					$submission['Websites']['name'],
	  					$submission['first_name'],
	  					$submission['last_name'],
	  					$submission['age'],
	  					$submission['gender'] == 1 ? 'Male' : 'Female',
	  					$submission['height'],
	  					$submission['weight'],
	  					$submission['phone'],
	  					$submission['cell'],
	  					$submission['email'],
	  					$submission['address'],
	  					$submission['city'],
	  					$submission['States']['abbreviation'],
	  					$submission['zipcode'],
	  					$submission['interests'],
	  					$submission['comments'],	
	  				));
	  				$i++;
	  			}
	  			fclose($fp);
	  			
	  			$response = $this->getResponse();
	  			
	  			$this->setLayout(false);
	  			
	  			 
			 	$response->clearHttpHeaders();
			 	$response->setHttpHeader('Content-Description', 'File Transfer'); 
				$response->setHttpHeader('Content-Type', 'application/octet-stream'); 
				$response->setHttpHeader('Pragma', 'public'); 
				$response->setHttpHeader('Expires', '0'); 
				$response->setHttpHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0'); 
				$response->setHttpHeader('Content-Disposition', 'attachment; filename=' . 'MODEL-SUBMISSIONS-CSV-EXPORT-'.time().'.csv');
				$response->sendHttpHeaders();
				$response->setContent(readfile($filename));
			 	$response->sendContent();
			 	die();
	  		}
  			
  			break;
  		}
  	}

  }
  
  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }
    
	//$this->filters->setuser($this->getUser());
	
    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }
  
  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@submissions');
    }
    
	Doctrine::getTable('Submissions')->setUser($this->getUser());
	
    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@submissions');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }
}
