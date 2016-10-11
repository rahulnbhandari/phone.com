<?php
/*
 Arbitration algorithm.
 This can be achived in several differnt ways.
 Using tools like Gearman hwich involves using job server
 This approach is just based on db to handle conflicts. Its simple :).
*/
 //this is a cron script that will be running on each server to process cron tasks
 //each server can be used to process a set pool of jobs 
 //example if there are three cron servers  server 1 will process job 1,4,7 and so on. Server 2 will process 2,5,8 and so on
 
 // This is using two tables one for cron tasks and the other for maintaining which server is processing the job.

 //get job
 //config for cron server
 const CRON_SERVER_ID = 1;
 const TOTAL_SERVERS = 3;
 $cronClient = new CronClient();
 while($cronClient->getNextQueuedJob()) {
 	if($cronClient->lockJob()) {
 		//call worker
 		$cronClient->processJob();
 	} else {
 		continue;
 	}
 }

 /*
	CronClient is an entity class wrapping cronClient table
 */
 class CronClient extends CronClientVO {
 	public function getNextQueuedJob() {
 		//sql query to get the next job from cronClient/cronJob table which is still queued and not locked
 	}

 	public function lockJob() {
 		//sql query to inssert entry into cronClientAssoc Table
 		//structure id,jobId,serverId (job id is unique entry)

 	}

 	public function processJOb() {
 		//logic to process Job
 		//update staus for cron job to processed when done or error if erored out 
 	}

 	public function save() {

 	}

 	public function refresh() {

 	}

 }
 //Data object wrapper
 // base class vo (valu object)
 class CronClientVO extends VO {
 	//mapper for table columns to entry 
	 //structure id,status,statusMessage,name,params
	 
 }

 class CronClientAssoc extends CronClientAssocVO {
 	public function save() {

 	}

 	public function refresh() {

 	}
 }

 //Data object wrapper
 // base class vo (value object)

 class CronClientAssociationVO extends VO {
 	//mapper for table columns to entry 
       //structure id,jobId,serverId (job id is unique entry)
 }


 


?>
