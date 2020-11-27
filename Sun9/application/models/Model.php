<?php 
	class Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		/*insertion*/
		function model_insert($table,$data)
		{
			return $this->db->insert($table,$data);
		}

		/*Select*/
		function model_select($table,$where='',$limit='',$offset='')
		{
			if($where!='')
			{
				return $this->db->get_where($table,$where)->result();
			}
			else
			{
				return $this->db->get($table)->result();
			}
		}

		function model_select_state($table)
		{
			$this->db->order_by('StateName');
			return $this->db->get($table)->result();
		}

		function model_select_city($table,$where='',$limit='',$offset='')
		{
			$this->db->order_by('city_name');
			return $this->db->get_where($table,$where)->result();
		}

		function model_customer_receipt_select($table,$where='')
		{
			$query=$this->db->query("select * from $table where cust_code=$where and installment_no in(select max(installment_no) from paymenttb where cust_code=$where)");
			return $query->result();
		}
		function model_custplan_receipt_select($where='')
		{
			$query=$this->db->query("select p.* from plantb p,customertb c where cust_code=$where and p.plan_code=c.cplan");
			return $query->result();
		}

		function model_branchnm_receipt_select($where='')
		{
			$query=$this->db->query("select bname from branchtb where bid='$where'");
			return $query->result();
		}

		function model_sponsornm_receipt_select($where='')
		{
			$query=$this->db->query("select sname from sponsortb where sponsor_code='$where'");
			return $query->result();
		}

		function model_customer_receipt_no_select($table)
		{
			$this->db->select_max('rec_no');
			return $this->db->get($table)->result();  
		}

		function model_branchcode_generate($table)
		{
			$this->db->order_by('bid');
			$this->db->select_max('bid');
			return $this->db->get($table)->result();
		}

		function model_select_for_customerreceipt_desc($table)
		{
			$this->db->order_by('rec_no desc');
			return $this->db->get($table)->result();
		}

		/*block*/
		function model_blockunblocksponsor_update($table,$data,$id)
		{
			$this->db->where('sponsor_code',$id);
			$this->db->update($table,$data);
		}

		function model_blockunblockcustomerupdate($table,$data,$id)
		{
			$this->db->where('cust_code',$id);
			$this->db->update($table,$data);
		}

		/*Delete*/
		function model_deletecustomerupdate($table,$data,$id)
		{
			$this->db->where('cust_code',$id);
			$this->db->update($table,$data);
		}

		function model_deleteplanupdate($table,$data,$id)
		{
			$this->db->where('plan_code',$id);
			$this->db->update($table,$data);
		}

		function model_deletebranchupdate($table,$data,$id)
		{
			$this->db->where('branch_code',$id);
			$this->db->update($table,$data);
		}

		function model_deletesponsorupdate($table,$data,$id)
		{
			$this->db->where('sponsor_code',$id);
			$this->db->update($table,$data);
		}

		/*Update*/
		function model_branch_update($table,$data,$id)
		{
			$this->db->where('branch_code',$id);
			return $this->db->update($table,$data);
		}

		function model_plan_update($table,$data,$id)
		{
			$this->db->where('plan_code',$id);
			return $this->db->update($table,$data);
		}

		function model_sponsor_update($table,$data,$id)
		{
			$this->db->where('sponsor_code',$id);
			return $this->db->update($table,$data);
		}	

		function model_customer_update($table,$data,$id)
		{
			$this->db->where('cust_code',$id);
			return $this->db->update($table,$data);
		}

		function model_deleteadminupdate($table,$data,$id)
		{
			$this->db->where('admin_code',$id);
			$this->db->update($table,$data);
		}

		function model_blockunblockadminupdate($table,$data,$id)
		{
			$this->db->where('admin_code',$id);
			$this->db->update($table,$data);
		}

		function model_admin_update($table,$data,$id)
		{
			$this->db->where('admin_code',$id);
			return $this->db->update($table,$data);
		}

		function model_max_cust_code()
		{
			$qry="select * from customertb order by cust_code desc limit 1";
			$ans=$this->db->query($qry);
			return $ans->result();
		}

		function model_search_rec($recno,$custid,$custnm,$scode,$fdate,$tdate)
		{
			$qry="select p.rec_no,p.cust_code,p.rec_date,c.cust_name,p.installment_no,p.installment_amt,p.other_amt,p.inst_bank_name,p.inst_no,p.net_amt,p.remark from customertb c,paymenttb p where p.cust_code=c.cust_code";

			if($recno!=='undefined')
			{
				$qry.=" and p.rec_no='$recno'";
			}
			if($custid!=='undefined')
			{
				$qry.=" and p.cust_code='$custid'";
			}
			if($custnm!=='undefined')
			{
				$custnm=str_replace('%20', ' ', $custnm);
				$qry.=" and c.cust_name='$custnm'";
			}
			if($scode!=='undefined')
			{
				$qry.=" and c.sponsor_code='$scode'";
			}
			if($fdate!=='undefined')
			{
				$str=str_replace('-', '/', $fdate);
				$qry.=" and STR_TO_DATE(p.rec_date,'%d/%m/%Y') >= STR_TO_DATE('".$str."','%d/%m/%Y')";
			}
			if($tdate!=='undefined')
			{
				$str1=str_replace('-', '/', $tdate);
				$qry.=" and STR_TO_DATE(p.rec_date,'%d/%m/%Y') <= STR_TO_DATE('".$str1."','%d/%m/%Y')";
			}
			
			$query=$this->db->query($qry);
			return $query->result();
		}

		function model_overdue_list()
		{
			$ans=$this->db->query("select max(installment_no) as instno,max(cust_code) as cust_code,max(due_date) as due_date,max(next_due_date) as next_due_date,max(duetime) as duetime from paymenttb group by cust_code");
			return $ans->result();
		}

		function model_link_property($id1,$id2,$data1,$data2)
		{
			$this->db->where('cust_code',$id1);
			$this->db->update('customertb',$data1);

			$this->db->where('cust_code',$id2);
			return $this->db->update('customertb',$data2);
		}

		function model_link_property1($id,$data)
		{
			$this->db->where('cust_code',$id);
			return $this->db->update('customertb',$data);
		}

		function model_generalsettings_update($data)
		{
			$this->db->where('id',1);
			return $this->db->update('generalsettings',$data);
		}

		function model_cust_overdue_list($where='')
		{
			$ans=$this->db->query("select max(installment_no) as instno,max(cust_code) as cust_code,max(due_date) as due_date,max(next_due_date) as next_due_date,max(duetime) as duetime from paymenttb where cust_code=$where group by cust_code");
			return $ans->result();
		}

		function model_password_update($custcode,$data)
		{
			$this->db->where('cust_code',$custcode);
			return $this->db->update('customertb',$data);
		}

		function model_deletenewsupdate($table,$data,$id)
		{
			$this->db->where('newsid',$id);
			$this->db->update($table,$data);
		}

		function model_deleteeventsupdate($table,$data,$id)
		{
			$this->db->where('eventid',$id);
			$this->db->update($table,$data);
		}

		function model_deleteanncounementupdate($table,$data,$id)
		{
			$this->db->where('Announcementsid',$id);
			$this->db->update($table,$data);
		}

		function model_annocement()
		{
			$qry="select * from announcementstb order by Announcementsid desc limit 1";
			$ans=$this->db->query($qry);
			return $ans->result();
		}

		function model_select_messagedata_limit5()
		{
			$qry="select * from questiontb where allowed=1 order by id desc limit 5";
			$ans=$this->db->query($qry);
			return $ans->result();
		}

		function model_select_notificationdata_limit5()
		{
			$qry="select * from notificationtb where allowed=1 order by id desc limit 5";
			$ans=$this->db->query($qry);
			return $ans->result();
		}

		function model_select_messagedata_all()
		{
			$qry="select * from questiontb where allowed=1 order by id desc";
			$ans=$this->db->query($qry);
			return $ans->result();
		}

		function model_select_notificationdata_all()
		{
			$qry="select * from notificationtb where allowed=1 order by id desc";
			$ans=$this->db->query($qry);
			return $ans->result();
		}

		function model_update_msg()
		{
			$this->db->update('questiontb',array('msg'=>'false'));
		}

		function model_noti_update_msg()
		{
			$this->db->update('notificationtb',array('msg'=>'false'));
		}

		function model_select_count_msg_true()
		{
			$qry="select * from questiontb where msg='true'";
			$ans=$this->db->query($qry);
			return $ans->result();	
		}

		function model_select_count_noti_msg_true()
		{
			$qry="select * from notificationtb where msg='true'";
			$ans=$this->db->query($qry);
			return $ans->result();	
		}

        function model_select_for_total_cust()
		{
			$ans=$this->db->query("select c.cust_code,max(pay.installment_no) as inst,c.branch_code,c.sponsor_code,c.cplan,p.pname,b.branch_code,pur.totalamount,sum(pay.net_amt) as totnamt,pay.rec_date,sum(pay.other_amt) as totoamt,pur.totalEMI from customertb c,plantb p,purchasetb pur,paymenttb pay,branchtb b where c.cplan=p.plan_code and c.cust_code=pur.cust_code and c.cust_code=pay.cust_code and c.branch_code=b.bid group by c.cust_code");
			return $ans->result();
		
		}
		
		function model_search_rec_cust($bcode,$pcode)
		{
			$qry="select c.cust_code,c.branch_code,c.sponsor_code,c.cplan,p.pname,pur.totalamount,sum(pay.net_amt) as totnamt,sum(pay.other_amt) as totoamt from customertb c,plantb p,purchasetb pur,paymenttb pay where c.cplan=p.plan_code and c.cust_code=pur.cust_code and c.cust_code=pay.cust_code";

			if($bcode!=='undefined')
			{
				$qry.=" and c.branch_code='$bcode'";
			}
			if($pcode!=='undefined')
			{
				//$pname=str_replace('%20', ' ', $pname);
				$qry.=" and c.sponsor_code=$pcode";
			}
			
			$qry.=" group by c.cust_code";
			$query=$this->db->query($qry);
			return $query->result();
		}

		function model_select_for_promoter_sale()
		{
			$ans=$this->db->query("select count(c.cust_code) as totcust,c.sponsor_code,sum(p.totalamount) as totamt,s.sname from customertb c,sponsortb s,purchasetb p where c.cust_code=p.cust_code and s.sponsor_code=c.sponsor_code group by c.sponsor_code");
			return $ans->result();
		}

		function model_search_rec_psale($pcode,$pname,$fdate,$tdate)
		{
			$qry="select count(c.cust_code) as totcust,c.sponsor_code,sum(p.totalamount) as totamt,s.sname from customertb c,sponsortb s,purchasetb p where c.cust_code=p.cust_code and s.sponsor_code=c.sponsor_code";

			if($pcode!=='undefined')
			{
				$qry.=" and c.sponsor_code=$pcode";
			}
			if($pname!=='undefined')
			{
				$pname=str_replace('%20', ' ', $pname);
				$qry.=" and s.sname='$pname'";
			}
			if($fdate!=='undefined')
			{
				$str=str_replace('-', '/', $fdate);
				$qry.=" and STR_TO_DATE(c.reg_date,'%d/%m/%Y') >= STR_TO_DATE('".$str."','%d/%m/%Y')";
			}
			if($tdate!=='undefined')
			{
				$str1=str_replace('-', '/', $tdate);
				$qry.=" and STR_TO_DATE(c.reg_date,'%d/%m/%Y') <= STR_TO_DATE('".$str1."','%d/%m/%Y')";
			}
			$qry.=" group by c.sponsor_code";
			$query=$this->db->query($qry);
			return $query->result();
		}

		function model_customer_sponsor_select($where='')
		{
			$query=$this->db->query("select * from customertb where sponsor_code='$where'");
			return $query->result();
		}

		function model_message_delete($id)
		{
			$query=$this->db->query("update questiontb set allowed=0 where id=$id");
		}

		function model_status_update($id)
		{
			$query=$this->db->query("update questiontb set status=0 where id=$id");
		}

		function model_select_review($table,$status)
		{
			$ans=$this->db->query("select * from $table where approved='$status' order by feedid desc");
			return $ans->result();
		}

		function model_change_review_status($status,$id)
		{
			$ans=$this->db->query("update feedbacktb set approved='$status' where feedid=$id");
			return "success";
		}

		function model_select_customer_review_limit5()
		{
			$qry="select * from feedbacktb where approved='approve' order by feedid desc limit 5";
			$ans=$this->db->query($qry);
			return $ans->result();
		}

		function model_select_for_promoter_commission($pcode,$pname)
		{
			$qry="select c.*,sum(c.totalcommission) from commissionpay c where";

			if($pcode!=='undefined')
			{
				$qry.=" c.sponsor_code=$pcode";
			}
			if($pname!=='undefined')
			{
				$pname=str_replace('%20', ' ', $pname);
				if($pcode=='undefined')
				{
					$qry.=" c.sname='$pname'";
				}
				else
				{
					$qry.=" and c.sname='$pname'";
				}
			}
			
			$qry.=" group by c.sponsor_code";
			$query=$this->db->query($qry);
			return $query->result();
		}

		function model_select_commission()
		{
			$query=$this->db->query("select c.*,sum(c.totalcommission) from commissionpay c group by c.sponsor_code");
			return $query->result();
		}

		function model_commission_sponsor_select($where='')
		{
			$query=$this->db->query("select * from commissionpay where sponsor_code='$where'");
			return $query->result();
		}

		function model_select_for_branch_sale()
		{
			$ans=$this->db->query("select count(c.cust_code) as totcust,c.sponsor_code,sum(p.totalamount) as totamt,c.branch_code,b.bname from customertb c,sponsortb s,purchasetb p,branchtb b where c.cust_code=p.cust_code and s.sponsor_code=c.sponsor_code and b.bid=c.branch_code group by c.branch_code");
			return $ans->result();
		
		}
		function model_search_rec_bsale($bcode,$bname,$fdate,$tdate)
		{

			$qry="select count(c.cust_code) as totcust,c.sponsor_code,sum(p.totalamount) as totamt,c.branch_code,b.bname,c.reg_date from customertb c,sponsortb s,purchasetb p,branchtb b where c.cust_code=p.cust_code and s.sponsor_code=c.sponsor_code and b.bid=c.branch_code";

			if($bcode!=='undefined')
			{
				$qry.=" and c.branch_code='$bcode'";
			}
			if($bname!=='undefined')
			{
				$bname=str_replace('%20', ' ', $bname);
				$qry.=" and b.bname='$bname'";
			}
			if($fdate!=='undefined')
			{
				$str=str_replace('-', '/', $fdate);
				$qry.=" and STR_TO_DATE(c.reg_date,'%d/%m/%Y') >= STR_TO_DATE('".$str."','%d/%m/%Y')";
			}
			if($tdate!=='undefined')
			{
				$str1=str_replace('-', '/', $tdate);
				$qry.=" and STR_TO_DATE(c.reg_date,'%d/%m/%Y') <= STR_TO_DATE('".$str1."','%d/%m/%Y')";
			}
			$qry.=" group by c.branch_code";
			$query=$this->db->query($qry);
			return $query->result();
		}

		function countcommission($where='')
		{
			$ans=$this->db->query("select max(STR_TO_DATE(paydate,'%d/%m/%Y')) as dd from commissionpay where sponsor_code='$where'")->result();
			$d=date('d/m/Y');
			if($ans[0]->dd==NULL)
			{
				$qry=$this->db->query("select cust_code,sum(net_amt) as totamt1,max(STR_TO_DATE(rec_date,'%d/%m/%Y')) as recdate from paymenttb where cust_code in(select cust_code from customertb where sponsor_code=".$where.") and STR_TO_DATE(rec_date,'%d/%m/%Y')<STR_TO_DATE('".$d."','%d/%m/%Y') order by rec_date DESC");
			
			}
			else
			{
				$qry=$this->db->query("select cust_code,sum(net_amt) as totamt1,max(STR_TO_DATE(rec_date,'%d/%m/%Y')) as recdate from paymenttb where cust_code in(select cust_code from customertb where sponsor_code='$where') and STR_TO_DATE(rec_date,'%d/%m/%Y')>=(select max(STR_TO_DATE(paydate,'%d/%m/%Y')) as dd from commissionpay where sponsor_code='$where') order by rec_date DESC");

			}

			return $qry->result();
		}

		function model_sponsor_commission_select($where='')
		{
			$query=$this->db->query("select * from sponsortb where sponsor_code='$where'");
			return $query->result();
		}

		function model_load_statename()
		{
			$query=$this->db->query("select StateName from state");
			return $query->result();
		}

		function model_load_cityname()
		{
			$query=$this->db->query("select city_name from city");
			return $query->result();
		}

		function model_search_property($state='',$city='',$minprice='',$maxprice='')
		{
			$mainquery="select * from projecttb where ptype='completed'";
			$stateid='';
			$cityid='';

			if($state!=='')
			{
				$query=$this->db->query("select * from state where StateName='$state'");
				$statedata=$query->result();
				$stateid=$statedata[0]->StateID;
				$mainquery.=" and stateid=$stateid";
			}
			if($city!=='')
			{
				$query1=$this->db->query("select * from city where city_name='$city'");
				$citydata=$query1->result();
				$cityid=$citydata[0]->city_id;
				$mainquery.=" and cityid=$cityid";
			}
			if($minprice!=='')
			{
				$mainquery.=" and price > $minprice";
			}
			if($maxprice!=='')
			{
				$mainquery.=" and price < $maxprice";
			}

			$mainquery.=' order by projectid desc limit 12';

			$query=$this->db->query($mainquery);
			return $query->result();
		}

		function model_select_news()
		{
			$query=$this->db->query("select * from newstb where allowed=1 order by newsid desc limit 4");
			return $query->result();
		}

		function model_select_events()
		{
			$query=$this->db->query("select * from eventstb where allowed=1 order by eventid desc limit 4");
			return $query->result();
		}

		function model_select_projectlist()
		{
			$query=$this->db->query("select * from projecttb order by projectid desc");
			return $query->result();
		}

		function model_select_upcomingprojectlist_limit5()
		{
			$query=$this->db->query("select * from projecttb where ptype='upcoming' order by projectid desc limit 5");
			return $query->result();
		}

		function model_select_all_projectlist_limit12()
		{
			$query=$this->db->query("select * from projecttb where ptype!='slider' order by projectid desc limit 12");
			return $query->result();
		}

		function model_select_silder_list_limit4()
		{
			$query=$this->db->query("select * from projecttb where ptype='slider' order by projectid desc limit 4");
			return $query->result();	
		}

		function model_select_project($where='')
		{
			$query=$this->db->query("select * from projecttb where ptype='$where' order by projectid desc limit 12");
			return $query->result();		
		}
	}
?>