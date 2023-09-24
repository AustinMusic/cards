<?php
class leasesDBController{
    public $db;
    
    public function getMfValues($id){
		$sql_fields[] = MFMATRIX_TABLE.".mfnounits";
		$sql_fields[] = MFMATRIX_TABLE.".mfsize";
		$sql_fields[] = MFMATRIX_TABLE.".mftotalsf";
		$sql_fields[] = MFMATRIX_TABLE.".mfrent";
		$sql_fields[] = MFMATRIX_TABLE.".mfrentsf";
		$sql_fields[] = MFMATRIX_TABLE.".mfnobr";
		$sql_fields[] = MFMATRIX_TABLE.".id";
		
		$tables_sql[] = MFMATRIX_TABLE;
		
		 $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
		$search_sql[] = MFMATRIX_TABLE.".FK_ReportID=:id";
		
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".MFMATRIX_TABLE.".id ASC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    }
    public function getSsvalues($id){
		$sql_fields[] = SSMATRIX_TABLE.".sssize";
		$sql_fields[] = SSMATRIX_TABLE.".ssunittype";
		$sql_fields[] = SSMATRIX_TABLE.".ssunitsf";
		$sql_fields[] = SSMATRIX_TABLE.".ssrentmo";
		$sql_fields[] = SSMATRIX_TABLE.".ssrentsf";
		$sql_fields[] = SSMATRIX_TABLE.".id";
		
		$tables_sql[] = SSMATRIX_TABLE;
		
		 $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
		$search_sql[] = SSMATRIX_TABLE.".FK_ReportID=:id";
		
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".SSMATRIX_TABLE.".id ASC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    }
    
    public function getLinks($id){
        $sql = "SELECT * FROM ".DOC_LINKS." WHERE ".DOC_LINKS.".FK_ReportID=:id" ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getMiscRentRecord($id){
        $sql_fields[] = REPORT_TABLE.".id";
        $sql_fields[] = "if(".PROPERTY_TABLE.".thumbnail = '', 'no-photo-tn.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) as thumbnail";
        $sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) as photo1";
        $sql_fields[] = PROPERTY_TABLE.".property_name";
        $sql_fields[] = PROPERTY_TABLE.".lat";
        $sql_fields[] = PROPERTY_TABLE.".lng";
        $sql_fields[] = "CONCAT(".PROPERTY_TABLE.".streetnumber,' ',".PROPERTY_TABLE.".streetname) AS address";
        $sql_fields[] = PROPERTY_TABLE.".city";
        $sql_fields[] = PROPERTY_TABLE.".state";

        $sql_fields[] = "DATE_FORMAT(".LEASES_TRANSACTIONS_TABLE.".lease_start_date,'%m/%y') as lease_start";
        $sql_fields[] = "CONCAT(".LEASES_TRANSACTIONS_TABLE.".total_lease_term_mos,' ',".WFDICTIONARY_TABLE.".definition) AS term";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lessee_name";
        $sql_fields[] = "FORMAT(".YARDABSORB_TABLE.".yard_land_area_sf,0) as yard_sf";
        $sql_fields[] = "CONCAT('$',FORMAT(".YARDABSORB_TABLE.".eff_yard_rent_sf_mo,3)) as yard_rent";
        $sql_fields[] = "CONCAT('$',FORMAT(".YARDABSORB_TABLE.".other_rent_sf_mo,0)) as other_rent_sf_mo";
        $sql_fields[] = YARDABSORB_TABLE.".desc_yard_space";
        $sql_fields[] = YARDABSORB_TABLE.".or_tenant"; 
        $sql_fields[] = WFDICTIONARY_M_TABLE.".definition AS ortypes";

        
        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' LEFT JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.LEASES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.LEASES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.YARDABSORB_TABLE.' ON '.REPORT_TABLE.'.id='.YARDABSORB_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.mos_vs_mos='.WFDICTIONARY_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' '.WFDICTIONARY_M_TABLE.' ON '.YARDABSORB_TABLE.'.ortypes='.WFDICTIONARY_M_TABLE.'.id';
         
        $search_sql[] = REPORT_TABLE.".id=:id";
        
        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    
	public function getRentsRecord($id){
        $sql_fields[] = REPORT_TABLE.".id";
        $sql_fields[] = "if(".PROPERTY_TABLE.".thumbnail = '', 'no-photo-tn.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) as thumbnail";
        $sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) as photo1";
        $sql_fields[] = PROPERTY_TABLE.".property_name";
        $sql_fields[] = PROPERTY_TABLE.".lat";
        $sql_fields[] = PROPERTY_TABLE.".lng";
        $sql_fields[] = "CONCAT(".PROPERTY_TABLE.".streetnumber,' ',".PROPERTY_TABLE.".streetname) AS address";
        $sql_fields[] = PROPERTY_TABLE.".city";
        $sql_fields[] = PROPERTY_TABLE.".state";
        
        $sql_fields[] = SUBMARKET_TABLE.".submarket";
        
        $sql_fields[] = PROPERTYTYPE_TABLE.".propertytype";
        
        $sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
            
        $sql_fields[] = BUILDING_TABLE.".const_descr";
        $sql_fields[] = BUILDING_TABLE.".year_built";
        $sql_fields[] = BUILDING_TABLE.".last_renovation";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) as overall_gba";

        $sql_fields[] = "DATE_FORMAT(".LEASES_TRANSACTIONS_TABLE.".lease_start_date,'%c/%e/%Y') as lease_start_date";
        $sql_fields[] = "CONCAT(".LEASES_TRANSACTIONS_TABLE.".total_lease_term_mos,' ',".WFDICTIONARY_TABLE.".definition) AS term";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lessee_name";
        $sql_fields[] = "FORMAT(".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf,0) as tenant_area_sf";            
        $sql_fields[] = "CONCAT('$',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell,3)) as eff_rent_sf_mo_shell";
        $sql_fields[] = "CONCAT('$',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_office,3)) as eff_rent_sf_mo_office";
        $sql_fields[] = "CONCAT('$',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_blend,3)) as eff_rent_sf_mo_blend";
        $sql_fields[] = "CONCAT('$',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr,2)) as eff_rent_sf_yr";
            
        $sql_fields[] = WFDICTIONARY_M_TABLE.".definition as lease_expense_term";
        $sql_fields[] = WFDICTIONARY_N_TABLE.".definition as exp_term_adj";
        
        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' LEFT JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.LEASES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.LEASES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';   
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.mos_vs_mos='.WFDICTIONARY_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' '.WFDICTIONARY_M_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.lease_expense_term='.WFDICTIONARY_M_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' '.WFDICTIONARY_N_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.exp_term_adj='.WFDICTIONARY_N_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.SUBMARKET_TABLE.' ON '.PROPERTY_TABLE.'.submarkid='.SUBMARKET_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
         
        $search_sql[] = REPORT_TABLE.".id=:id";
        
        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getRecord($id){
        
        
        $sql_fields[] = REPORT_TABLE.".id";
        $sql_fields[] = REPORT_TABLE.".status";
        $sql_fields[] = REPORT_TABLE.".priority";
        $sql_fields[] = REPORT_TABLE.".AssignedTo";
		$sql_fields[] = REPORT_TABLE.".ModifiedBy";
        $sql_fields[] = REPORT_TABLE.".DueDate";
        $sql_fields[] = REPORT_TABLE.".reportname";
        $sql_fields[] = REPORT_TABLE.".template";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%M %e %Y %r') as DateCreated";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateModified,'%M %e %Y %r') as DateModified";
		$sql_fields[] = "IF(".REPORT_TABLE.".cloneorigin is NULL, 'Original File', CONCAT('Clone of ',".REPORT_TABLE.".cloneorigin, ' ID ', ".REPORT_TABLE.".cloneid)) as FileOrigin";
		$sql_fields[] = "IF(".REPORT_TABLE.".cloneorigin = 'Appraisal Report', CONCAT('appraisals.php?id=',".REPORT_TABLE.".cloneid), IF(".REPORT_TABLE.".cloneorigin = 'Improved Sales', CONCAT('improvedsales.php?id=',".REPORT_TABLE.".cloneid), IF(".REPORT_TABLE.".cloneorigin = 'Land Sales', CONCAT('landsales.php?id=',".REPORT_TABLE.".cloneid), CONCAT('leases.php?id=',".REPORT_TABLE.".cloneid)))) as clonelink";
        
        $sql_fields[] = PROPERTY_TABLE.".property_name";
        $sql_fields[] = PROPERTY_TABLE.".address";
        $sql_fields[] = PROPERTY_TABLE.".streetnumber";
        $sql_fields[] = PROPERTY_TABLE.".streetname";
        $sql_fields[] = PROPERTY_TABLE.".city";
        $sql_fields[] = PROPERTY_TABLE.".county";
        $sql_fields[] = PROPERTY_TABLE.".state";
        $sql_fields[] = PROPERTY_TABLE.".zip_code";
        $sql_fields[] = PROPERTY_TABLE.".lat";
        $sql_fields[] = PROPERTY_TABLE.".lng";
        $sql_fields[] = PROPERTY_TABLE.".propertytype";
        $sql_fields[] = PROPERTY_TABLE.".propertysubtype";
        $sql_fields[] = PROPERTY_TABLE.".msa";
        $sql_fields[] = PROPERTY_TABLE.".park_type";
        $sql_fields[] = PROPERTY_TABLE.".genmarket";
        $sql_fields[] = PROPERTY_TABLE.".submarkid";
        $sql_fields[] = PROPERTY_TABLE.".photo1";
        $sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) as image";
        $sql_fields[] = PROPERTY_TABLE.".thumbnail";
        $sql_fields[] = PROPERTY_TABLE.".traffic_count";
        $sql_fields[] = PROPERTY_TABLE.".traffic_date";
        $sql_fields[] = PROPERTY_TABLE.".inter_street";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) AS gross_land_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_acre,3) AS gross_land_acre";
        $sql_fields[] = PROPERTY_TABLE.".site_access";
        $sql_fields[] = PROPERTY_TABLE.".exposure";
        $sql_fields[] = PROPERTY_TABLE.".zoning_code";
        $sql_fields[] = PROPERTY_TABLE.".emdomain";
        
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_nra,0) AS overall_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".vacancy_sf_nra,0) AS vacancy_sf_nra";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".oe_vacany_pct,5),' %') AS oe_vacany_pct";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".inline_space_sf,0) AS inline_space_sf";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".inline_vacancy_pct,3),' %') AS inline_vacancy_pct";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".land_build_ratio_primary,1) AS land_build_ratio_primary";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_stalls,0) AS parking_stalls";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_ratio_gba,2) AS parking_ratio_gba";
        $sql_fields[] = BUILDING_TABLE.".parking_ratio";
        $sql_fields[] = BUILDING_TABLE.".year_built_search";
        $sql_fields[] = BUILDING_TABLE.".last_renovation";
        $sql_fields[] = BUILDING_TABLE.".year_built";
        $sql_fields[] = BUILDING_TABLE.".no_building";
        $sql_fields[] = BUILDING_TABLE.".no_stories";
        $sql_fields[] = BUILDING_TABLE.".occupancy_type";
        $sql_fields[] = BUILDING_TABLE.".building_quality";
        $sql_fields[] = BUILDING_TABLE.".const_descr";
        $sql_fields[] = BUILDING_TABLE.".other_const_features";
        $sql_fields[] = BUILDING_TABLE.".int_condition";
        $sql_fields[] = BUILDING_TABLE.".ext_condition";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".office_bo_sf,0) AS office_bo_sf";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".flex_off_sf,0) as flex_off_sf";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".load_factor,1),' %') AS load_factor"; 
        $sql_fields[] = BUILDING_TABLE.".load_factor_input"; 
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".flex_off_pct_nra,1),' %') AS flex_off_pct_nra";
        $sql_fields[] = BUILDING_TABLE.".building_class";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".office_bo_pct,1),' %') AS office_bo_pct";
        
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".property_appraised";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".appraiser_name";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".mc_job";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lessor_name";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".new_renewal";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lessee_name";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".conf_lessee";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lessee_type";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".conf_lessee_name";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_start_date";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_start_comment";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_end_date";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_options";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".total_lease_term_mos";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_option_desc";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".mos_vs_mos";
		$sql_fields[] = LEASES_TRANSACTIONS_TABLE.".confirm1";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".confirm2";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".datasource";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".confirm_date";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".inspect_type";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".inspect_date";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".mc_file_no";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".confirm_1_source";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".relationship_1";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".confirm_2_souce";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".relationship_2";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".market_flyer";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".showabsorb1";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".showyard";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".showor";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".show_land_bldg";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".proj_site"; 
        $sql_fields[] = "FORMAT(".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf,0) AS tenant_area_sf"; 
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".floor_number";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_expense_term";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".exp_term_adj";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".sched_contract_rent"; 
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_esc_terms_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".init_rent_sf_mo_shell,3)) AS init_rent_sf_mo_shell";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".init_rent_sf_mo_office,3)) AS init_rent_sf_mo_office";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".init_rent_sf_mo_blend,3)) AS init_rent_sf_mo_blend";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell,3)) AS eff_rent_sf_mo_shell";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_office,3)) AS eff_rent_sf_mo_office";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_blend,3)) AS eff_rent_sf_mo_blend";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".eff_rent_comment_2";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".tenant_paid_cam_sf_mo";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".init_rent_sf_yr,3)) AS init_rent_sf_yr";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".init_month_rent,0)) AS init_month_rent"; 
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".init_annual_rent,0)) AS init_annual_rent"; 
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr,3)) AS eff_rent_sf_yr";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_month_rent,0)) AS eff_month_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_annual_rent,0)) AS eff_annual_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_annual_rent_tunnel,3)) AS eff_annual_rent_tunnel";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".eff_rent_comment_1";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".percentage_rent";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".tenant_paid_cam_sf_yr";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".landlord_paid_exp_sf_yr,3)) AS landlord_paid_exp_sf_yr"; 
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".landord_pays"; 
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".desc_ti";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".concessions_desc"; 
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".space_generation"; 
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".space_position"; 
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".ind_ann_land_rent,0)) as ind_ann_land_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".ind_ann_bldg_rent,0)) as ind_ann_bldg_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".LEASES_TRANSACTIONS_TABLE.".ind_ann_bldg_rent_sf,2)) as ind_ann_bldg_rent_sf";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_comment";
        $sql_fields[] = LEASES_TRANSACTIONS_TABLE.".conf_comments";
        
        
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_fire_sprinkler";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".veh_level";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_service_sf,0) AS veh_service_sf";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_showroom_pct,1),' %') AS veh_showroom_pct";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_showroom_sf,0) AS veh_showroom_sf";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".veh_tunnel";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_truck_dock";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_truck_grade";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_clear_height";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_rail";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_hvac";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_elevator_service";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_type_hvac";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_anchor_tenant";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_alcohol";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_drive_thru";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_no_seats";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_playground";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_other_tenant";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".veh_dealer_name"; 
        
        $sql_fields[] = "FORMAT(".YARDABSORB_TABLE.".yard_land_area_sf,0) AS yard_land_area_sf";
        $sql_fields[] = YARDABSORB_TABLE.".desc_yard_space";
        $sql_fields[] = YARDABSORB_TABLE.".yard_lease_exp_term";
        $sql_fields[] = YARDABSORB_TABLE.".yard_exp_terms_adj";
        $sql_fields[] = YARDABSORB_TABLE.".sched_yard_contracts";
        $sql_fields[] = YARDABSORB_TABLE.".desc_yard_esc_terms";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".YARDABSORB_TABLE.".init_yard_rent_sf_mo,3)) AS init_yard_rent_sf_mo";
        $sql_fields[] = YARDABSORB_TABLE.".yard_concession_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".YARDABSORB_TABLE.".eff_yard_rent_sf_mo,3)) AS eff_yard_rent_sf_mo";
        $sql_fields[] = YARDABSORB_TABLE.".eff_yard_rent_comment";
        $sql_fields[] = YARDABSORB_TABLE.".yard_cam_sf_mo";
        $sql_fields[] = YARDABSORB_TABLE.".yard_lease_comments";
        $sql_fields[] = YARDABSORB_TABLE.".conf_yard_comments";
        $sql_fields[] = YARDABSORB_TABLE.".or_tenant";
        $sql_fields[] = YARDABSORB_TABLE.".ortypes";
        $sql_fields[] = YARDABSORB_TABLE.".desc_or_space";
        $sql_fields[] = YARDABSORB_TABLE.".or_lease_exp_term";
        $sql_fields[] = YARDABSORB_TABLE.".or_exp_terms_adj";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".YARDABSORB_TABLE.".other_rent_sf_mo,0)) as other_rent_sf_mo";
        $sql_fields[] = YARDABSORB_TABLE.".eff_or_comment";
        $sql_fields[] = YARDABSORB_TABLE.".or_concession_desc";
        $sql_fields[] = YARDABSORB_TABLE.".orterms";
        $sql_fields[] = YARDABSORB_TABLE.".or_survey";
        $sql_fields[] = YARDABSORB_TABLE.".sched_or_contracts";
        $sql_fields[] = YARDABSORB_TABLE.".or_comments";
        $sql_fields[] = YARDABSORB_TABLE.".or_conf_source";
        $sql_fields[] = YARDABSORB_TABLE.".or_conf_date";
        $sql_fields[] = YARDABSORB_TABLE.".or_confby";
        $sql_fields[] = YARDABSORB_TABLE.".or_fileno";
        $sql_fields[] = YARDABSORB_TABLE.".pre_lease_sf";
        $sql_fields[] = YARDABSORB_TABLE.".pre_lease_pct_nra";
        $sql_fields[] = YARDABSORB_TABLE.".pre_lease_pct_inline";
        $sql_fields[] = YARDABSORB_TABLE.".total_absorb_sf";
        $sql_fields[] = YARDABSORB_TABLE.".total_lease_pct_nra";
        $sql_fields[] = YARDABSORB_TABLE.".total_lease_pct_inline";
        $sql_fields[] = YARDABSORB_TABLE.".start_date";
        $sql_fields[] = YARDABSORB_TABLE.".end_date";
        $sql_fields[] = YARDABSORB_TABLE.".no_mos_absorb";
        $sql_fields[] = "FORMAT(".YARDABSORB_TABLE.".sf_absorb_mo,0) as sf_absorb_mo";
        $sql_fields[] = YARDABSORB_TABLE.".absorb_comment";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".YARDABSORB_TABLE.".est_land_value_sf,2)) as est_land_value_sf";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".YARDABSORB_TABLE.".est_land_value,0)) as est_land_value";
        $sql_fields[] = "CONCAT(".YARDABSORB_TABLE.".rate_return_land,' %') as rate_return_land";
        
        $sql_fields[] = MULTIFAMILY_TABLE.".park_quality";
        $sql_fields[] = MULTIFAMILY_TABLE.".park_cond";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_show_absorbtion";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_parking_type";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_parking_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_application_fee,0)) as mf_application_fee";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_movein_fee,0)) as mf_movein_fee";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_non_refund";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_unit";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_vacant_unit";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_pct_vacancy";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_unit_type";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_single";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_sw_low_rent,0)) AS mf_sw_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_sw_high_rent,0)) AS mf_sw_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_sw_avg_rent,0)) AS mf_sw_avg_rent";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_double";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_dw_low_rent,0)) AS mf_dw_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_dw_high_rent,0)) AS mf_dw_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_dw_avg_rent,0)) AS mf_dw_avg_rent";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_triple";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_tw_low_rent,0)) AS mf_tw_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_tw_high_rent,0)) AS mf_tw_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_tw_avg_rent,0)) AS mf_tw_avg_rent";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_no_rv_spaces";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_rv_low_rent,0)) AS mf_rv_low_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_rv_high_rent,0)) AS mf_rv_high_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_rv_avg_rent,0)) AS mf_rv_avg_rent";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_high_rent,0)) AS mf_high_rent";
        $sql_fields[] = "FORMAT(".MULTIFAMILY_TABLE.".mf_total_spaces,0) AS mf_total_spaces";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".MULTIFAMILY_TABLE.".mf_total_avg_rent,0)) AS mf_total_avg_rent";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_avg_rent_comment";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_last_increase";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_amount";
        $sql_fields[] = "FORMAT(".MULTIFAMILY_TABLE.".mf_prelease_unit,0) AS mf_prelease_unit";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_start_date_prelease";
        $sql_fields[] = "CONCAT(FORMAT(".MULTIFAMILY_TABLE.".mf_prelease_pct_unit,1),' %') AS mf_prelease_pct_unit";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_end_rent_prelease";
        $sql_fields[] = "FORMAT(".MULTIFAMILY_TABLE.".mf_total_unit_absorb,0) AS mf_total_unit_absorb";
        $sql_fields[] = "FORMAT(".MULTIFAMILY_TABLE.".mf_mos_absorbtion,0) AS mf_mos_absorbtion";
        $sql_fields[] = "CONCAT(FORMAT(".MULTIFAMILY_TABLE.".mf_total_lease_pct_unit,1),' %') AS mf_total_lease_pct_unit";
        $sql_fields[] = "FORMAT(".MULTIFAMILY_TABLE.".mf_unit_absorb_mo,0) AS mf_unit_absorb_mo";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_exercise";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_spa";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_wd_hookup";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_other_amenities";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_rpt";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_insurance";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_cam";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_mgmt_fees";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_water";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_sewer";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_hot_water";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_heat";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_gas";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_trash";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_internet";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_landlord_cable";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_washdry";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_fireplace";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_micro";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_patio";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_dish";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_dispo";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_vault";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_exstor";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_club";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_playg";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_bbq";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_bigtv";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_sports";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_laund";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_pool";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_busi";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_sec";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_sauna";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_rvstor";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_carport";
        $sql_fields[] = MULTIFAMILY_TABLE.".mf_shed";
        
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_no_unit_type";
        $sql_fields[] = "FORMAT(".SELFSTORAGE_TABLE.".ms_total_units,0) as ms_total_units";
        $sql_fields[] = "FORMAT(".SELFSTORAGE_TABLE.".ms_no_vacant_unit,0) as ms_no_vacant_unit";
        $sql_fields[] = "CONCAT(FORMAT(".SELFSTORAGE_TABLE.".ms_pct_vacant_unit,1),' %') as ms_pct_vacant_unit";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_vacancy_comment";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_coded_access";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_onsite_mgr";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_manager_res";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_alarm";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_heated_unit";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_access_hours";
        $sql_fields[] = SELFSTORAGE_TABLE.".ms_concessions";
        
        $sql_fields[] = TEMPLATES_TABLE.".templatepath";
        $sql_fields[] = "CONCAT(".WFUSERS_TABLE.".firstname,' ',".WFUSERS_TABLE.".lastname) as CreatedBy";
        $sql_fields[] = "CONCAT(".WFUSERS_M_TABLE.".firstname,' ',".WFUSERS_M_TABLE.".lastname) as ModifiedBy";
        
        
            
        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.LEASES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.LEASES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.YARDABSORB_TABLE.' ON '.REPORT_TABLE.'.id='.YARDABSORB_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.MULTIFAMILY_TABLE.' ON '.REPORT_TABLE.'.id='.MULTIFAMILY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SELFSTORAGE_TABLE.' ON '.REPORT_TABLE.'.id='.SELFSTORAGE_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' ON '.REPORT_TABLE.'.CreatedBy='.WFUSERS_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' '.WFUSERS_M_TABLE.' ON '.REPORT_TABLE.'.ModifiedBy='.WFUSERS_M_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
        
        $search_sql[] = REPORT_TABLE.".id=:id";

        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    
    public function leaseOperation($leases,$user_id){
        $actionMode = "INSERT";
        if(isset($_GET['id'])){
            $actionMode = "UPDATE";
        }
        
        try{
            $this->db->beginTransaction();
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".REPORT_TABLE." (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, template, CreatedBy, ModifiedBy)
    				VALUES  (:FK_ReportTypeID, :status, :priority, :AssignedTo, :DueDate, :OwnerID, :reportname, :template, :CreatedBy, :ModifiedBy)");
        
                $stmt->bindValue(':FK_ReportTypeID',3,PDO::PARAM_INT);
                $stmt->bindValue(':OwnerID',$user_id,PDO::PARAM_INT);
                $stmt->bindValue(':CreatedBy',$user_id,PDO::PARAM_INT);
                $stmt->bindValue(':ModifiedBy',$user_id,PDO::PARAM_INT);
            }else{
                $stmt = $this->db->prepare("UPDATE ".REPORT_TABLE." SET status=:status, DateModified=:DateModified, priority=:priority, AssignedTo=:AssignedTo, DueDate=:DueDate, reportname=:reportname,
                    template=:template, ModifiedBy=:ModifiedBy
    				WHERE ".REPORT_TABLE.".id=:reportID");

                $stmt->bindValue(':DateModified',$leases->getDateModified(),PDO::PARAM_STR);
                $stmt->bindValue(':reportID',$leases->getId(),PDO::PARAM_INT);
                $stmt->bindValue(':ModifiedBy',$user_id,PDO::PARAM_INT);
            }
        
            /*Common bindings*/
            $stmt->bindValue(':status',$leases->getStatus(),PDO::PARAM_INT);
            $stmt->bindValue(':priority',$leases->getPriority(),PDO::PARAM_INT);
            $stmt->bindValue(':AssignedTo',$leases->getAssignedTo(),PDO::PARAM_INT);
            $stmt->bindValue(':DueDate',$leases->getDueDate(),PDO::PARAM_STR);
            $stmt->bindValue(':reportname',$leases->getReportname(),PDO::PARAM_STR);
            $stmt->bindValue(':template',$leases->getTemplate(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $leases->setId($this->db->lastInsertId());
            }

            $directory = "../comp_images/".$leases->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }
            
            $mediaUtilities = new rbe_mediaUtilities();
            if(!file_exists($_FILES['photo1']['tmp_name']) || !is_uploaded_file($_FILES['photo1']['tmp_name'])) {
                $final_file = $_POST['photo1path'];
                $final_file_thumb = $_POST['thumbpath'];
            } else {
                $file = explode(".", $_FILES["photo1"]["name"]);
                $file_loc = $_FILES['photo1']['tmp_name'];
                $file_size = $_FILES['photo1']['size'];
                $file_type = $_FILES['photo1']['type'];
                $folder = "../comp_images/" . $leases->getId() . "/";
                $new_file_name = round(microtime(true)) . '.' . end($file);
                $final_file=str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$final_file);
                $mediaUtilities->imageTransformations($final_file,$folder,400,400,100,"","","resize",true);
                $final_file_thumb = explode(".",$final_file);
                $extension = $final_file_thumb[count($final_file_thumb)-1];
                array_splice($final_file_thumb,count($final_file_thumb)-1);
                $final_file_thumb = implode(".",$final_file_thumb);
                $final_file_thumb = $final_file_thumb."-tn".".".$extension;
                $mediaUtilities->imageTransformations($final_file,$folder,40,40,100,"-tn","","resize",true);
            }
            $leases->setPhoto1($final_file);
            $leases->setThumbnail($final_file_thumb);
        
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT ".PROPERTY_TABLE." (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, park_type, genmarket, msa, submarkid, traffic_count, traffic_date, inter_street, gross_land_sf, gross_land_acre, exposure, site_access, zoning_code, emdomain) VALUES (:FK_ReportID, :photo1, :thumbnail, :property_name, :address, :streetnumber, :streetname, :city, :county, :state, :zip_code, :lat, :lng, :propertytype, :propertysubtype, :park_type, :genmarket, :msa, :submarkid, :traffic_count, :traffic_date, :inter_street, :gross_land_sf, :gross_land_acre, :exposure, :site_access, :zoning_code, :emdomain)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".PROPERTY_TABLE." SET photo1=:photo1,thumbnail=:thumbnail,property_name=:property_name,address=:address,streetnumber=:streetnumber,streetname=:streetname,city=:city,county=:county,state=:state,zip_code=:zip_code,lat=:lat,lng=:lng,propertytype=:propertytype,propertysubtype=:propertysubtype,park_type=:park_type,genmarket=:genmarket,msa=:msa,submarkid=:submarkid,traffic_count=:traffic_count,traffic_date=:traffic_date,inter_street=:inter_street,gross_land_sf=:gross_land_sf,gross_land_acre=:gross_land_acre,exposure=:exposure,site_access=:site_access,zoning_code=:zoning_code, emdomain=:emdomain	WHERE ".PROPERTY_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':photo1',$leases->getPhoto1(),PDO::PARAM_STR);
            $stmt->bindValue(':thumbnail',$leases->getThumbnail(),PDO::PARAM_STR);
            $stmt->bindValue(':property_name',$leases->getProperty_name(),PDO::PARAM_STR);
            $stmt->bindValue(':address',$leases->getAddress(),PDO::PARAM_STR);
            $stmt->bindValue(':streetnumber',$leases->getStreetnumber(),PDO::PARAM_STR);
            $stmt->bindValue(':streetname',$leases->getStreetname(),PDO::PARAM_STR);
            $stmt->bindValue(':city',$leases->getCity(),PDO::PARAM_STR);
            $stmt->bindValue(':county',$leases->getCounty(),PDO::PARAM_STR);
            $stmt->bindValue(':state',$leases->getState(),PDO::PARAM_STR);
            $stmt->bindValue(':zip_code',$leases->getZip_code(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$leases->getLat(),PDO::PARAM_STR);
            $stmt->bindValue(':lng',$leases->getLng(),PDO::PARAM_STR);
            $stmt->bindValue(':propertytype',$leases->getPropertytype(),PDO::PARAM_INT);
            $stmt->bindValue(':propertysubtype',$leases->getPropertysubtype(),PDO::PARAM_INT);
            $stmt->bindValue(':park_type',$leases->getPark_type(),PDO::PARAM_INT);
            $stmt->bindValue(':genmarket',$leases->getGenmarket(),PDO::PARAM_INT);
            $stmt->bindValue(':msa',$leases->getMsa(),PDO::PARAM_STR);
            $stmt->bindValue(':submarkid',$leases->getSubmarkid(),PDO::PARAM_INT);
            $stmt->bindValue(':traffic_count',$leases->getTraffic_count(),PDO::PARAM_STR);
            $stmt->bindValue(':traffic_date',$leases->getTraffic_date(),PDO::PARAM_STR);
            $stmt->bindValue(':inter_street',$leases->getInter_street(),PDO::PARAM_STR);
            $stmt->bindValue(':gross_land_sf',$leases->getGross_land_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':gross_land_acre',$leases->getGross_land_acre(),PDO::PARAM_INT);
            $stmt->bindValue(':exposure',$leases->getExposure(),PDO::PARAM_INT);
            $stmt->bindValue(':site_access',$leases->getSite_access(),PDO::PARAM_INT);
            $stmt->bindValue(':zoning_code',$leases->getZoning_code(),PDO::PARAM_STR);
            $stmt->bindValue(':emdomain',$leases->getEmdomain(),PDO::PARAM_INT);
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".BUILDING_TABLE." (FK_ReportID, overall_gba, overall_nra, vacancy_sf_nra, oe_vacany_pct, inline_space_sf, inline_vacancy_pct, land_build_ratio_primary, parking_stalls, parking_ratio_gba, parking_ratio, year_built, year_built_search, last_renovation, occupancy_type, no_building, no_stories, const_descr, other_const_features, building_quality, int_condition, ext_condition, office_bo_sf, flex_off_sf, office_bo_pct, load_factor, load_factor_input, flex_off_pct_nra, building_class) VALUES (:FK_ReportID, :overall_gba, :overall_nra, :vacancy_sf_nra, :oe_vacany_pct, :inline_space_sf, :inline_vacancy_pct, :land_build_ratio_primary, :parking_stalls, :parking_ratio_gba, :parking_ratio, :year_built, :year_built_search, :last_renovation, :occupancy_type, :no_building, :no_stories, :const_descr, :other_const_features, :building_quality, :int_condition, :ext_condition, :office_bo_sf, :flex_off_sf, :office_bo_pct, :load_factor, :load_factor_input, :flex_off_pct_nra, :building_class)");
                
            }else{
                $stmt = $this->db->prepare("UPDATE ".BUILDING_TABLE." SET overall_gba=:overall_gba, overall_nra=:overall_nra, vacancy_sf_nra=:vacancy_sf_nra, oe_vacany_pct=:oe_vacany_pct, inline_space_sf=:inline_space_sf, inline_vacancy_pct=:inline_vacancy_pct, land_build_ratio_primary=:land_build_ratio_primary, parking_stalls=:parking_stalls, parking_ratio_gba=:parking_ratio_gba, parking_ratio=:parking_ratio, year_built=:year_built, year_built_search=:year_built_search, last_renovation=:last_renovation, occupancy_type=:occupancy_type, no_building=:no_building, no_stories=:no_stories, const_descr=:const_descr, other_const_features=:other_const_features, building_quality=:building_quality, int_condition=:int_condition, ext_condition=:ext_condition, office_bo_sf=:office_bo_sf, flex_off_sf=:flex_off_sf, office_bo_pct=:office_bo_pct, load_factor=:load_factor, load_factor_input=:load_factor_input, flex_off_pct_nra=:flex_off_pct_nra, building_class=:building_class WHERE ".BUILDING_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':overall_gba',$leases->getOverall_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':overall_nra',$leases->getOverall_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':vacancy_sf_nra',$leases->getVacancy_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_vacany_pct',$leases->getOe_vacany_pct(),PDO::PARAM_INT);
            $stmt->bindValue(':inline_space_sf',$leases->getInline_space_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':inline_vacancy_pct',$leases->getInline_vacancy_pct(),PDO::PARAM_INT);
            $stmt->bindValue(':land_build_ratio_primary',$leases->getLand_build_ratio_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_stalls',$leases->getParking_stalls(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio_gba',$leases->getParking_ratio_gba(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio',$leases->getParking_ratio(),PDO::PARAM_STR);
            $stmt->bindValue(':year_built',$leases->getYear_built(),PDO::PARAM_STR);
            $stmt->bindValue(':year_built_search',$leases->getYear_built_search(),PDO::PARAM_STR);
            $stmt->bindValue(':last_renovation',$leases->getLast_renovation(),PDO::PARAM_STR);
            $stmt->bindValue(':occupancy_type',$leases->getOccupancy_type(),PDO::PARAM_STR);
            $stmt->bindValue(':no_building',$leases->getNo_building(),PDO::PARAM_STR);
            $stmt->bindValue(':no_stories',$leases->getNo_stories(),PDO::PARAM_STR);
            $stmt->bindValue(':const_descr',$leases->getConst_descr(),PDO::PARAM_STR);
            $stmt->bindValue(':other_const_features',$leases->getOther_const_features(),PDO::PARAM_STR);
            $stmt->bindValue(':building_quality',$leases->getBuilding_quality(),PDO::PARAM_STR);
            $stmt->bindValue(':int_condition',$leases->getInt_condition(),PDO::PARAM_STR);
            $stmt->bindValue(':ext_condition',$leases->getExt_condition(),PDO::PARAM_STR);
            $stmt->bindValue(':office_bo_sf',$leases->getOffice_bo_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':flex_off_sf',$leases->getFlex_off_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':office_bo_pct',$leases->getOffice_bo_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':load_factor',$leases->getLoad_factor(),PDO::PARAM_STR);
            $stmt->bindValue(':load_factor_input',$leases->getLoad_factor_input(),PDO::PARAM_STR);
            $stmt->bindValue(':flex_off_pct_nra',$leases->getFlex_off_pct_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':building_class',$leases->getBuilding_class(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
        
            
           if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".PROPERTYTYPE_DETAILS_TABLE." (FK_ReportID, off_fire_sprinkler, veh_showroom_sf, veh_showroom_pct, veh_service_sf, veh_tunnel, ind_truck_dock, ind_truck_grade, ind_clear_height, ind_rail, ind_hvac, off_elevator_service, off_type_hvac, shop_anchor_tenant, rest_no_seats, rest_drive_thru, shop_other_tenant, rest_alcohol, rest_playground, veh_level, veh_dealer_name) VALUES (:FK_ReportID, :off_fire_sprinkler, :veh_showroom_sf, :veh_showroom_pct, :veh_service_sf, :veh_tunnel, :ind_truck_dock, :ind_truck_grade, :ind_clear_height, :ind_rail, :ind_hvac, :off_elevator_service, :off_type_hvac, :shop_anchor_tenant, :rest_no_seats, :rest_drive_thru, :shop_other_tenant, :rest_alcohol, :rest_playground, :veh_level, :veh_dealer_name )");
            }else{
                $stmt = $this->db->prepare("UPDATE ".PROPERTYTYPE_DETAILS_TABLE." SET off_fire_sprinkler=:off_fire_sprinkler, veh_showroom_sf=:veh_showroom_sf, veh_showroom_pct=:veh_showroom_pct, veh_service_sf=:veh_service_sf, veh_tunnel=:veh_tunnel, ind_truck_dock=:ind_truck_dock, ind_truck_grade=:ind_truck_grade, ind_clear_height=:ind_clear_height, ind_rail=:ind_rail, ind_hvac=:ind_hvac, off_elevator_service=:off_elevator_service, off_type_hvac=:off_type_hvac, shop_anchor_tenant=:shop_anchor_tenant, rest_no_seats=:rest_no_seats, rest_drive_thru=:rest_drive_thru, shop_other_tenant=:shop_other_tenant, rest_alcohol=:rest_alcohol, rest_playground=:rest_playground, veh_level=:veh_level, veh_dealer_name=:veh_dealer_name WHERE ".PROPERTYTYPE_DETAILS_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':off_fire_sprinkler',$leases->getOff_fire_sprinkler(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_showroom_sf',$leases->getVeh_showroom_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_showroom_pct',$leases->getVeh_showroom_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_service_sf',$leases->getVeh_service_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_tunnel',$leases->getVeh_tunnel(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_truck_dock',$leases->getInd_truck_dock(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_truck_grade',$leases->getInd_truck_grade(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_clear_height',$leases->getInd_clear_height(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_rail',$leases->getInd_rail(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_hvac',$leases->getInd_hvac(),PDO::PARAM_STR);
            $stmt->bindValue(':off_elevator_service',$leases->getOff_elevator_service(),PDO::PARAM_STR);
            $stmt->bindValue(':off_type_hvac',$leases->getOff_type_hvac(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_anchor_tenant',$leases->getShop_anchor_tenant(),PDO::PARAM_STR);
            $stmt->bindValue(':rest_no_seats',$leases->getRest_no_seats(),PDO::PARAM_STR);
            $stmt->bindValue(':rest_drive_thru',$leases->getRest_drive_thru(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_other_tenant',$leases->getShop_other_tenant(),PDO::PARAM_STR);
            $stmt->bindValue(':rest_alcohol',$leases->getRest_alcohol(),PDO::PARAM_STR);
            $stmt->bindValue(':rest_playground',$leases->getRest_playground(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_level',$leases->getVeh_level(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_dealer_name',$leases->getVeh_dealer_name(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
            
            $stmt->execute();
            
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".LEASES_TRANSACTIONS_TABLE." (FK_ReportID, property_appraised, appraiser_name, mc_job, lessor_name, new_renewal, lessee_name, conf_lessee, lessee_type, conf_lessee_name, lease_start_date, lease_start_comment, lease_end_date, lease_options, total_lease_term_mos, lease_option_desc, mos_vs_mos, confirm_date, inspect_type, inspect_date, mc_file_no, confirm_1_source, relationship_1, confirm_2_souce, relationship_2, market_flyer, showabsorb1, showyard, show_land_bldg, tenant_area_sf, floor_number, space_generation, space_position, lease_expense_term, exp_term_adj, sched_contract_rent, lease_esc_terms_desc, init_rent_sf_mo_shell, init_rent_sf_mo_office, init_rent_sf_mo_blend, eff_rent_sf_mo_shell, eff_rent_sf_mo_office, eff_rent_sf_mo_blend, eff_rent_comment_2, tenant_paid_cam_sf_mo, init_rent_sf_yr, init_month_rent, init_annual_rent, eff_rent_sf_yr, eff_month_rent, eff_annual_rent, eff_annual_rent_tunnel, eff_rent_comment_1, percentage_rent, tenant_paid_cam_sf_yr, landlord_paid_exp_sf_yr, landord_pays, desc_ti, concessions_desc, ind_ann_land_rent, ind_ann_bldg_rent, ind_ann_bldg_rent_sf, lease_comment, conf_comments, proj_site, showor, confirm1, confirm2, datasource) VALUES (:FK_ReportID, :property_appraised, :appraiser_name, :mc_job, :lessor_name, :new_renewal, :lessee_name, :conf_lessee, :lessee_type, :conf_lessee_name, :lease_start_date, :lease_start_comment, :lease_end_date, :lease_options, :total_lease_term_mos, :lease_option_desc, :mos_vs_mos, :confirm_date, :inspect_type, :inspect_date, :mc_file_no, :confirm_1_source, :relationship_1, :confirm_2_souce, :relationship_2, :market_flyer, :showabsorb1, :showyard, :show_land_bldg, :tenant_area_sf, :floor_number, :space_generation, :space_position, :lease_expense_term, :exp_term_adj, :sched_contract_rent, :lease_esc_terms_desc, :init_rent_sf_mo_shell, :init_rent_sf_mo_office, :init_rent_sf_mo_blend, :eff_rent_sf_mo_shell, :eff_rent_sf_mo_office, :eff_rent_sf_mo_blend, :eff_rent_comment_2, :tenant_paid_cam_sf_mo, :init_rent_sf_yr, :init_month_rent, :init_annual_rent, :eff_rent_sf_yr, :eff_month_rent, :eff_annual_rent, :eff_annual_rent_tunnel, :eff_rent_comment_1, :percentage_rent, :tenant_paid_cam_sf_yr, :landlord_paid_exp_sf_yr, :landord_pays, :desc_ti, :concessions_desc, :ind_ann_land_rent, :ind_ann_bldg_rent, :ind_ann_bldg_rent_sf, :lease_comment, :conf_comments, :proj_site, :showor, :confirm1, :confirm2, :datasource)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".LEASES_TRANSACTIONS_TABLE." SET property_appraised=:property_appraised, appraiser_name=:appraiser_name, mc_job=:mc_job, lessor_name=:lessor_name, new_renewal=:new_renewal, lessee_name=:lessee_name, conf_lessee=:conf_lessee, lessee_type=:lessee_type, conf_lessee_name=:conf_lessee_name, lease_start_date=:lease_start_date, lease_start_comment=:lease_start_comment, lease_end_date=:lease_end_date, lease_options=:lease_options, total_lease_term_mos=:total_lease_term_mos, lease_option_desc=:lease_option_desc, mos_vs_mos=:mos_vs_mos, confirm_date=:confirm_date, inspect_type=:inspect_type, inspect_date=:inspect_date, mc_file_no=:mc_file_no, confirm_1_source=:confirm_1_source, relationship_1=:relationship_1, confirm_2_souce=:confirm_2_souce, relationship_2=:relationship_2, market_flyer=:market_flyer, showabsorb1=:showabsorb1, showyard=:showyard, show_land_bldg=:show_land_bldg, tenant_area_sf=:tenant_area_sf, floor_number=:floor_number, space_generation=:space_generation, space_position=:space_position, lease_expense_term=:lease_expense_term, exp_term_adj=:exp_term_adj, sched_contract_rent=:sched_contract_rent, lease_esc_terms_desc=:lease_esc_terms_desc, init_rent_sf_mo_shell=:init_rent_sf_mo_shell, init_rent_sf_mo_office=:init_rent_sf_mo_office, init_rent_sf_mo_blend=:init_rent_sf_mo_blend, eff_rent_sf_mo_shell=:eff_rent_sf_mo_shell, eff_rent_sf_mo_office=:eff_rent_sf_mo_office, eff_rent_sf_mo_blend=:eff_rent_sf_mo_blend, eff_rent_comment_2=:eff_rent_comment_2, tenant_paid_cam_sf_mo=:tenant_paid_cam_sf_mo, init_rent_sf_yr=:init_rent_sf_yr, init_month_rent=:init_month_rent, init_annual_rent=:init_annual_rent, eff_rent_sf_yr=:eff_rent_sf_yr, eff_month_rent=:eff_month_rent, eff_annual_rent=:eff_annual_rent, eff_annual_rent_tunnel=:eff_annual_rent_tunnel, eff_rent_comment_1=:eff_rent_comment_1, percentage_rent=:percentage_rent, tenant_paid_cam_sf_yr=:tenant_paid_cam_sf_yr, landlord_paid_exp_sf_yr=:landlord_paid_exp_sf_yr, landord_pays=:landord_pays, desc_ti=:desc_ti, concessions_desc=:concessions_desc, ind_ann_land_rent=:ind_ann_land_rent, ind_ann_bldg_rent=:ind_ann_bldg_rent, ind_ann_bldg_rent_sf=:ind_ann_bldg_rent_sf, lease_comment=:lease_comment, conf_comments=:conf_comments, proj_site=:proj_site, showor=:showor, confirm1=:confirm1, confirm2=:confirm2, datasource=:datasource WHERE ".LEASES_TRANSACTIONS_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':property_appraised',$leases->getProperty_appraised(),PDO::PARAM_INT);
            $stmt->bindValue(':appraiser_name',$leases->getAppraiser_name(),PDO::PARAM_STR);
            $stmt->bindValue(':mc_job',$leases->getMc_job(),PDO::PARAM_STR);
            $stmt->bindValue(':lessor_name',$leases->getLessor_name(),PDO::PARAM_STR);
            $stmt->bindValue(':new_renewal',$leases->getNew_renewal(),PDO::PARAM_INT);
            $stmt->bindValue(':lessee_name',$leases->getLessee_name(),PDO::PARAM_STR);
            $stmt->bindValue(':conf_lessee',$leases->getConf_lessee(),PDO::PARAM_STR);
            $stmt->bindValue(':lessee_type',$leases->getLessee_type(),PDO::PARAM_INT);
            $stmt->bindValue(':conf_lessee_name',$leases->getConf_lessee_name(),PDO::PARAM_STR);
            $stmt->bindValue(':lease_start_date',$leases->getLease_start_date(),PDO::PARAM_STR);
            $stmt->bindValue(':lease_start_comment',$leases->getLease_start_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':lease_end_date',$leases->getLease_end_date(),PDO::PARAM_STR);
            $stmt->bindValue(':lease_options',$leases->getLease_options(),PDO::PARAM_STR);
            $stmt->bindValue(':total_lease_term_mos',$leases->getTotal_lease_term_mos(),PDO::PARAM_STR);
            $stmt->bindValue(':lease_option_desc',$leases->getLease_option_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':mos_vs_mos',$leases->getMos_vs_mos(),PDO::PARAM_STR);
			$stmt->bindValue(':confirm1',$leases->getConfirm1(),PDO::PARAM_INT);
            $stmt->bindValue(':confirm2',$leases->getConfirm2(),PDO::PARAM_INT);
            $stmt->bindValue(':datasource',$leases->getDatasource(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_date',$leases->getConfirm_date(),PDO::PARAM_STR);
            $stmt->bindValue(':inspect_type',$leases->getInspect_type(),PDO::PARAM_INT);
            $stmt->bindValue(':inspect_date',$leases->getInspect_date(),PDO::PARAM_STR);
            $stmt->bindValue(':mc_file_no',$leases->getMc_file_no(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_1_source',$leases->getConfirm_1_source(),PDO::PARAM_STR);
            $stmt->bindValue(':relationship_1',$leases->getRelationship_1(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_2_souce',$leases->getConfirm_2_souce(),PDO::PARAM_STR);
            $stmt->bindValue(':relationship_2',$leases->getRelationship_2(),PDO::PARAM_STR);
            $stmt->bindValue(':market_flyer',$leases->getMarket_flyer(),PDO::PARAM_STR);
            $stmt->bindValue(':showabsorb1',$leases->getShowabsorb1(),PDO::PARAM_INT);
            $stmt->bindValue(':showyard',$leases->getShowyard(),PDO::PARAM_INT);
            $stmt->bindValue(':show_land_bldg',$leases->getShow_land_bldg(),PDO::PARAM_INT);
            $stmt->bindValue(':tenant_area_sf',$leases->getTenant_area_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':floor_number',$leases->getFloor_number(),PDO::PARAM_STR);
            $stmt->bindValue(':space_generation',$leases->getSpace_generation(),PDO::PARAM_INT);
            $stmt->bindValue(':space_position',$leases->getSpace_position(),PDO::PARAM_INT);
            $stmt->bindValue(':lease_expense_term',$leases->getLease_expense_term(),PDO::PARAM_STR);
            $stmt->bindValue(':exp_term_adj',$leases->getExp_term_adj(),PDO::PARAM_STR);
            $stmt->bindValue(':sched_contract_rent',$leases->getSched_contract_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':lease_esc_terms_desc',$leases->getLease_esc_terms_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':init_rent_sf_mo_shell',$leases->getInit_rent_sf_mo_shell(),PDO::PARAM_STR);
            $stmt->bindValue(':init_rent_sf_mo_office',$leases->getInit_rent_sf_mo_office(),PDO::PARAM_STR);
            $stmt->bindValue(':init_rent_sf_mo_blend',$leases->getInit_rent_sf_mo_blend(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_rent_sf_mo_shell',$leases->getEff_rent_sf_mo_shell(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_rent_sf_mo_office',$leases->getEff_rent_sf_mo_office(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_rent_sf_mo_blend',$leases->getEff_rent_sf_mo_blend(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_rent_comment_2',$leases->getEff_rent_comment_2(),PDO::PARAM_STR);
            $stmt->bindValue(':tenant_paid_cam_sf_mo',$leases->getTenant_paid_cam_sf_mo(),PDO::PARAM_STR);
            $stmt->bindValue(':init_rent_sf_yr',$leases->getInit_rent_sf_yr(),PDO::PARAM_STR);
            $stmt->bindValue(':init_month_rent',$leases->getInit_month_rent(),PDO::PARAM_INT);
            $stmt->bindValue(':init_annual_rent',$leases->getInit_annual_rent(),PDO::PARAM_INT);
            $stmt->bindValue(':eff_rent_sf_yr',$leases->getEff_rent_sf_yr(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_month_rent',$leases->getEff_month_rent(),PDO::PARAM_INT);
            $stmt->bindValue(':eff_annual_rent',$leases->getEff_annual_rent(),PDO::PARAM_INT);
            $stmt->bindValue(':eff_annual_rent_tunnel',$leases->getEff_annual_rent_tunnel(),PDO::PARAM_INT);
            $stmt->bindValue(':eff_rent_comment_1',$leases->getEff_rent_comment_1(),PDO::PARAM_STR);
            $stmt->bindValue(':percentage_rent',$leases->getPercentage_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':tenant_paid_cam_sf_yr',$leases->getTenant_paid_cam_sf_yr(),PDO::PARAM_STR);
            $stmt->bindValue(':landlord_paid_exp_sf_yr',$leases->getLandlord_paid_exp_sf_yr(),PDO::PARAM_STR);
            $stmt->bindValue(':landord_pays',$leases->getLandord_pays(),PDO::PARAM_STR);
            $stmt->bindValue(':desc_ti',$leases->getDesc_ti(),PDO::PARAM_STR);
            $stmt->bindValue(':concessions_desc',$leases->getConcessions_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_ann_land_rent',$leases->getInd_ann_land_rent(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_ann_bldg_rent',$leases->getInd_ann_bldg_rent(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_ann_bldg_rent_sf',$leases->getInd_ann_bldg_rent_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':lease_comment',$leases->getLease_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':conf_comments',$leases->getConf_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':proj_site',$leases->getProj_site(),PDO::PARAM_INT);
            $stmt->bindValue(':showor',$leases->getShowor(),PDO::PARAM_INT);
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
            
            $stmt->execute();
            

            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".MULTIFAMILY_TABLE." (FK_ReportID, park_quality, park_cond, mf_show_absorbtion, mf_parking_type, mf_parking_rent, mf_application_fee, mf_movein_fee, mf_non_refund, mf_no_unit, mf_vacant_unit, mf_pct_vacancy, mf_no_unit_type, mf_no_single, mf_sw_low_rent, mf_sw_high_rent, mf_sw_avg_rent, mf_no_double, mf_dw_low_rent, mf_dw_high_rent, mf_dw_avg_rent, mf_no_triple, mf_tw_low_rent, mf_tw_high_rent, mf_tw_avg_rent, mf_no_rv_spaces, mf_rv_low_rent, mf_rv_high_rent, mf_rv_avg_rent, mf_high_rent, mf_total_spaces, mf_total_avg_rent, mf_avg_rent_comment, mf_last_increase, mf_amount, mf_prelease_unit, mf_start_date_prelease, mf_prelease_pct_unit, mf_end_rent_prelease, mf_total_unit_absorb, mf_mos_absorbtion, mf_total_lease_pct_unit, mf_unit_absorb_mo, mf_exercise, mf_spa, mf_wd_hookup, mf_other_amenities, mf_landlord_rpt, mf_landlord_insurance, mf_landlord_cam, mf_landlord_mgmt_fees, mf_landlord_water, mf_landlord_sewer, mf_landlord_hot_water, mf_landlord_heat, mf_landlord_gas, mf_landlord_trash, mf_landlord_internet, mf_landlord_cable, mf_washdry, mf_fireplace, mf_micro, mf_patio, mf_dish, mf_dispo, mf_vault, mf_exstor, mf_club, mf_playg, mf_bbq, mf_bigtv, mf_sports, mf_laund, mf_pool, mf_busi, mf_sec, mf_sauna, mf_rvstor, mf_carport, mf_shed) VALUES (:FK_ReportID, :park_quality,:park_cond,:mf_show_absorbtion,:mf_parking_type,:mf_parking_rent,:mf_application_fee,:mf_movein_fee,:mf_non_refund,:mf_no_unit,:mf_vacant_unit,:mf_pct_vacancy,:mf_no_unit_type,:mf_no_single,:mf_sw_low_rent,:mf_sw_high_rent,:mf_sw_avg_rent,:mf_no_double,:mf_dw_low_rent,:mf_dw_high_rent,:mf_dw_avg_rent,:mf_no_triple,:mf_tw_low_rent,:mf_tw_high_rent,:mf_tw_avg_rent,:mf_no_rv_spaces,:mf_rv_low_rent,:mf_rv_high_rent,:mf_rv_avg_rent,:mf_high_rent,:mf_total_spaces,:mf_total_avg_rent,:mf_avg_rent_comment,:mf_last_increase,:mf_amount,:mf_prelease_unit,:mf_start_date_prelease,:mf_prelease_pct_unit,:mf_end_rent_prelease,:mf_total_unit_absorb,:mf_mos_absorbtion,:mf_total_lease_pct_unit,:mf_unit_absorb_mo,:mf_exercise,:mf_spa,:mf_wd_hookup,:mf_other_amenities,:mf_landlord_rpt,:mf_landlord_insurance,:mf_landlord_cam,:mf_landlord_mgmt_fees,:mf_landlord_water,:mf_landlord_sewer,:mf_landlord_hot_water,:mf_landlord_heat,:mf_landlord_gas,:mf_landlord_trash,:mf_landlord_internet,:mf_landlord_cable,:mf_washdry,:mf_fireplace,:mf_micro,:mf_patio,:mf_dish,:mf_dispo,:mf_vault,:mf_exstor,:mf_club,:mf_playg,:mf_bbq,:mf_bigtv,:mf_sports,:mf_laund,:mf_pool,:mf_busi,:mf_sec,:mf_sauna,:mf_rvstor,:mf_carport,:mf_shed)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".MULTIFAMILY_TABLE." SET park_quality=:park_quality, park_cond=:park_cond, mf_show_absorbtion=:mf_show_absorbtion, mf_parking_type=:mf_parking_type, mf_parking_rent=:mf_parking_rent, mf_application_fee=:mf_application_fee, mf_movein_fee=:mf_movein_fee, mf_non_refund=:mf_non_refund, mf_no_unit=:mf_no_unit, mf_vacant_unit=:mf_vacant_unit, mf_pct_vacancy=:mf_pct_vacancy, mf_no_unit_type=:mf_no_unit_type, mf_no_single=:mf_no_single, mf_sw_low_rent=:mf_sw_low_rent, mf_sw_high_rent=:mf_sw_high_rent, mf_sw_avg_rent=:mf_sw_avg_rent, mf_no_double=:mf_no_double, mf_dw_low_rent=:mf_dw_low_rent, mf_dw_high_rent=:mf_dw_high_rent, mf_dw_avg_rent=:mf_dw_avg_rent, mf_no_triple=:mf_no_triple, mf_tw_low_rent=:mf_tw_low_rent, mf_tw_high_rent=:mf_tw_high_rent, mf_tw_avg_rent=:mf_tw_avg_rent, mf_no_rv_spaces=:mf_no_rv_spaces, mf_rv_low_rent=:mf_rv_low_rent, mf_rv_high_rent=:mf_rv_high_rent, mf_rv_avg_rent=:mf_rv_avg_rent, mf_high_rent=:mf_high_rent, mf_total_spaces=:mf_total_spaces, mf_total_avg_rent=:mf_total_avg_rent, mf_avg_rent_comment=:mf_avg_rent_comment, mf_last_increase=:mf_last_increase, mf_amount=:mf_amount, mf_prelease_unit=:mf_prelease_unit, mf_start_date_prelease=:mf_start_date_prelease, mf_prelease_pct_unit=:mf_prelease_pct_unit, mf_end_rent_prelease=:mf_end_rent_prelease, mf_total_unit_absorb=:mf_total_unit_absorb, mf_mos_absorbtion=:mf_mos_absorbtion, mf_total_lease_pct_unit=:mf_total_lease_pct_unit, mf_unit_absorb_mo=:mf_unit_absorb_mo, mf_exercise=:mf_exercise, mf_spa=:mf_spa, mf_wd_hookup=:mf_wd_hookup, mf_other_amenities=:mf_other_amenities, mf_landlord_rpt=:mf_landlord_rpt, mf_landlord_insurance=:mf_landlord_insurance, mf_landlord_cam=:mf_landlord_cam, mf_landlord_mgmt_fees=:mf_landlord_mgmt_fees, mf_landlord_water=:mf_landlord_water, mf_landlord_sewer=:mf_landlord_sewer, mf_landlord_hot_water=:mf_landlord_hot_water, mf_landlord_heat=:mf_landlord_heat, mf_landlord_gas=:mf_landlord_gas, mf_landlord_trash=:mf_landlord_trash, mf_landlord_internet=:mf_landlord_internet, mf_landlord_cable=:mf_landlord_cable, mf_washdry=:mf_washdry, mf_fireplace=:mf_fireplace, mf_micro=:mf_micro, mf_patio=:mf_patio, mf_dish=:mf_dish, mf_dispo=:mf_dispo, mf_vault=:mf_vault, mf_exstor=:mf_exstor, mf_club=:mf_club, mf_playg=:mf_playg, mf_bbq=:mf_bbq, mf_bigtv=:mf_bigtv, mf_sports=:mf_sports, mf_laund=:mf_laund, mf_pool=:mf_pool, mf_busi=:mf_busi, mf_sec=:mf_sec, mf_sauna=:mf_sauna, mf_rvstor=:mf_rvstor, mf_carport=:mf_carport, mf_shed=:mf_shed WHERE ".MULTIFAMILY_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':park_quality',$leases->getPark_quality(),PDO::PARAM_STR);
            $stmt->bindValue(':park_cond',$leases->getPark_cond(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_show_absorbtion',$leases->getMf_show_absorbtion(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_parking_type',$leases->getMf_parking_type(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_parking_rent',$leases->getMf_parking_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_application_fee',$leases->getMf_application_fee(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_movein_fee',$leases->getMf_movein_fee(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_non_refund',$leases->getMf_non_refund(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_unit',$leases->getMf_no_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_vacant_unit',$leases->getMf_vacant_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_pct_vacancy',$leases->getMf_pct_vacancy(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_unit_type',$leases->getMf_no_unit_type(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_single',$leases->getMf_no_single(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sw_low_rent',$leases->getMf_sw_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sw_high_rent',$leases->getMf_sw_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sw_avg_rent',$leases->getMf_sw_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_double',$leases->getMf_no_double(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dw_low_rent',$leases->getMf_dw_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dw_high_rent',$leases->getMf_dw_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dw_avg_rent',$leases->getMf_dw_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_triple',$leases->getMf_no_triple(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_tw_low_rent',$leases->getMf_tw_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_tw_high_rent',$leases->getMf_tw_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_tw_avg_rent',$leases->getMf_tw_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_no_rv_spaces',$leases->getMf_no_rv_spaces(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_rv_low_rent',$leases->getMf_rv_low_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_rv_high_rent',$leases->getMf_rv_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_rv_avg_rent',$leases->getMf_rv_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_high_rent',$leases->getMf_high_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_total_spaces',$leases->getMf_total_spaces(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_total_avg_rent',$leases->getMf_total_avg_rent(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_avg_rent_comment',$leases->getMf_avg_rent_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_last_increase',$leases->getMf_last_increase(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_amount',$leases->getMf_amount(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_prelease_unit',$leases->getMf_prelease_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_start_date_prelease',$leases->getMf_start_date_prelease(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_prelease_pct_unit',$leases->getMf_prelease_pct_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_end_rent_prelease',$leases->getMf_end_rent_prelease(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_total_unit_absorb',$leases->getMf_total_unit_absorb(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_mos_absorbtion',$leases->getMf_mos_absorbtion(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_total_lease_pct_unit',$leases->getMf_total_lease_pct_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_unit_absorb_mo',$leases->getMf_unit_absorb_mo(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_exercise',$leases->getMf_exercise(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_spa',$leases->getMf_spa(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_wd_hookup',$leases->getMf_wd_hookup(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_other_amenities',$leases->getMf_other_amenities(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_rpt',$leases->getMf_landlord_rpt(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_insurance',$leases->getMf_landlord_insurance(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_cam',$leases->getMf_landlord_cam(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_mgmt_fees',$leases->getMf_landlord_mgmt_fees(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_water',$leases->getMf_landlord_water(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_sewer',$leases->getMf_landlord_sewer(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_hot_water',$leases->getMf_landlord_hot_water(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_heat',$leases->getMf_landlord_heat(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_gas',$leases->getMf_landlord_gas(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_trash',$leases->getMf_landlord_trash(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_internet',$leases->getMf_landlord_internet(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_landlord_cable',$leases->getMf_landlord_cable(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_washdry',$leases->getMf_washdry(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_fireplace',$leases->getMf_fireplace(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_micro',$leases->getMf_micro(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_patio',$leases->getMf_patio(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dish',$leases->getMf_dish(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_dispo',$leases->getMf_dispo(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_vault',$leases->getMf_vault(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_exstor',$leases->getMf_exstor(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_club',$leases->getMf_club(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_playg',$leases->getMf_playg(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_bbq',$leases->getMf_bbq(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_bigtv',$leases->getMf_bigtv(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sports',$leases->getMf_sports(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_laund',$leases->getMf_laund(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_pool',$leases->getMf_pool(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_busi',$leases->getMf_busi(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sec',$leases->getMf_sec(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_sauna',$leases->getMf_sauna(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_rvstor',$leases->getMf_rvstor(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_carport',$leases->getMf_carport(),PDO::PARAM_STR);
            $stmt->bindValue(':mf_shed',$leases->getMf_shed(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
        
            $stmt->execute();
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".SELFSTORAGE_TABLE." (FK_ReportID, ms_no_unit_type, ms_total_units, ms_no_vacant_unit, ms_pct_vacant_unit, ms_vacancy_comment, ms_coded_access, ms_onsite_mgr, ms_manager_res, ms_alarm, ms_heated_unit, ms_access_hours, ms_concessions) VALUES (:FK_ReportID, :ms_no_unit_type, :ms_total_units, :ms_no_vacant_unit, :ms_pct_vacant_unit, :ms_vacancy_comment, :ms_coded_access, :ms_onsite_mgr, :ms_manager_res, :ms_alarm, :ms_heated_unit, :ms_access_hours, :ms_concessions)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".SELFSTORAGE_TABLE." SET ms_no_unit_type=:ms_no_unit_type, ms_total_units=:ms_total_units, ms_no_vacant_unit=:ms_no_vacant_unit, ms_pct_vacant_unit=:ms_pct_vacant_unit, ms_vacancy_comment=:ms_vacancy_comment, ms_coded_access=:ms_coded_access, ms_onsite_mgr=:ms_onsite_mgr, ms_manager_res=:ms_manager_res, ms_alarm=:ms_alarm, ms_heated_unit=:ms_heated_unit, ms_access_hours=:ms_access_hours, ms_concessions=:ms_concessions WHERE ".SELFSTORAGE_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':ms_no_unit_type',$leases->getMs_no_unit_type(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_total_units',$leases->getMs_total_units(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_no_vacant_unit',$leases->getMs_no_vacant_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_pct_vacant_unit',$leases->getMs_pct_vacant_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_vacancy_comment',$leases->getMs_vacancy_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_coded_access',$leases->getMs_coded_access(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_onsite_mgr',$leases->getMs_onsite_mgr(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_manager_res',$leases->getMs_manager_res(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_alarm',$leases->getMs_alarm(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_heated_unit',$leases->getMs_heated_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_access_hours',$leases->getMs_access_hours(),PDO::PARAM_STR);
            $stmt->bindValue(':ms_concessions',$leases->getMs_concessions(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
            
            $stmt->execute();
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".YARDABSORB_TABLE." (FK_ReportID, yard_land_area_sf, desc_yard_space, yard_lease_exp_term, yard_exp_terms_adj, sched_yard_contracts, desc_yard_esc_terms, init_yard_rent_sf_mo, yard_concession_desc, eff_yard_rent_sf_mo, eff_yard_rent_comment, yard_cam_sf_mo, yard_lease_comments, conf_yard_comments, pre_lease_sf, pre_lease_pct_nra, pre_lease_pct_inline, total_absorb_sf, total_lease_pct_nra, total_lease_pct_inline, start_date, end_date, no_mos_absorb, sf_absorb_mo, absorb_comment, est_land_value_sf, est_land_value, rate_return_land, or_tenant, ortypes, desc_or_space, or_lease_exp_term, or_exp_terms_adj, other_rent_sf_mo, eff_or_comment, or_concession_desc, orterms, or_survey, sched_or_contracts, desc_or_esc_terms, or_comments, or_conf_source, or_conf_date, or_confby, or_fileno) VALUES (:FK_ReportID, :yard_land_area_sf, :desc_yard_space, :yard_lease_exp_term, :yard_exp_terms_adj, :sched_yard_contracts, :desc_yard_esc_terms, :init_yard_rent_sf_mo, :yard_concession_desc, :eff_yard_rent_sf_mo, :eff_yard_rent_comment, :yard_cam_sf_mo, :yard_lease_comments, :conf_yard_comments, :pre_lease_sf, :pre_lease_pct_nra, :pre_lease_pct_inline, :total_absorb_sf, :total_lease_pct_nra, :total_lease_pct_inline, :start_date, :end_date, :no_mos_absorb, :sf_absorb_mo, :absorb_comment, :est_land_value_sf, :est_land_value, :rate_return_land, :or_tenant, :ortypes, :desc_or_space, :or_lease_exp_term, :or_exp_terms_adj, :other_rent_sf_mo, :eff_or_comment, :or_concession_desc, :orterms, :or_survey, :sched_or_contracts, :desc_or_esc_terms, :or_comments, :or_conf_source, :or_conf_date, :or_confby, :or_fileno)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".YARDABSORB_TABLE." SET yard_land_area_sf=:yard_land_area_sf, desc_yard_space=:desc_yard_space, yard_lease_exp_term=:yard_lease_exp_term, yard_exp_terms_adj=:yard_exp_terms_adj, sched_yard_contracts=:sched_yard_contracts, desc_yard_esc_terms=:desc_yard_esc_terms, init_yard_rent_sf_mo=:init_yard_rent_sf_mo, yard_concession_desc=:yard_concession_desc, eff_yard_rent_sf_mo=:eff_yard_rent_sf_mo, eff_yard_rent_comment=:eff_yard_rent_comment, yard_cam_sf_mo=:yard_cam_sf_mo, yard_lease_comments=:yard_lease_comments, conf_yard_comments=:conf_yard_comments, pre_lease_sf=:pre_lease_sf, pre_lease_pct_nra=:pre_lease_pct_nra, pre_lease_pct_inline=:pre_lease_pct_inline, total_absorb_sf=:total_absorb_sf, total_lease_pct_nra=:total_lease_pct_nra, total_lease_pct_inline=:total_lease_pct_inline, start_date=:start_date, end_date=:end_date, no_mos_absorb=:no_mos_absorb, sf_absorb_mo=:sf_absorb_mo, absorb_comment=:absorb_comment, est_land_value_sf=:est_land_value_sf, est_land_value=:est_land_value, rate_return_land=:rate_return_land, or_tenant=:or_tenant, ortypes=:ortypes, desc_or_space=:desc_or_space, or_lease_exp_term=:or_lease_exp_term, or_exp_terms_adj=:or_exp_terms_adj, other_rent_sf_mo=:other_rent_sf_mo, eff_or_comment=:eff_or_comment, or_concession_desc=:or_concession_desc, orterms=:orterms, or_survey=:or_survey, sched_or_contracts=:sched_or_contracts, desc_or_esc_terms=:desc_or_esc_terms, or_comments=:or_comments, or_conf_source=:or_conf_source, or_conf_date=:or_conf_date, or_confby=:or_confby, or_fileno=:or_fileno WHERE ".YARDABSORB_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':yard_land_area_sf',$leases->getYard_land_area_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':desc_yard_space',$leases->getDesc_yard_space(),PDO::PARAM_STR);
            $stmt->bindValue(':yard_lease_exp_term',$leases->getYard_lease_exp_term(),PDO::PARAM_STR);
            $stmt->bindValue(':yard_exp_terms_adj',$leases->getYard_exp_terms_adj(),PDO::PARAM_STR);
            $stmt->bindValue(':sched_yard_contracts',$leases->getSched_yard_contracts(),PDO::PARAM_STR);
            $stmt->bindValue(':desc_yard_esc_terms',$leases->getDesc_yard_esc_terms(),PDO::PARAM_STR);
            $stmt->bindValue(':init_yard_rent_sf_mo',$leases->getInit_yard_rent_sf_mo(),PDO::PARAM_STR);
            $stmt->bindValue(':yard_concession_desc',$leases->getYard_concession_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_yard_rent_sf_mo',$leases->getEff_yard_rent_sf_mo(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_yard_rent_comment',$leases->getEff_yard_rent_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':yard_cam_sf_mo',$leases->getYard_cam_sf_mo(),PDO::PARAM_STR);
            $stmt->bindValue(':yard_lease_comments',$leases->getYard_lease_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':conf_yard_comments',$leases->getConf_yard_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':pre_lease_sf',$leases->getPre_lease_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':pre_lease_pct_nra',$leases->getPre_lease_pct_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':pre_lease_pct_inline',$leases->getPre_lease_pct_inline(),PDO::PARAM_STR);
            $stmt->bindValue(':total_absorb_sf',$leases->getTotal_absorb_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':total_lease_pct_nra',$leases->getTotal_lease_pct_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':total_lease_pct_inline',$leases->getTotal_lease_pct_inline(),PDO::PARAM_STR);
            $stmt->bindValue(':start_date',$leases->getStart_date(),PDO::PARAM_STR);
            $stmt->bindValue(':end_date',$leases->getEnd_date(),PDO::PARAM_STR);
            $stmt->bindValue(':no_mos_absorb',$leases->getNo_mos_absorb(),PDO::PARAM_STR);
            $stmt->bindValue(':sf_absorb_mo',$leases->getSf_absorb_mo(),PDO::PARAM_STR);
            $stmt->bindValue(':absorb_comment',$leases->getAbsorb_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':est_land_value_sf',$leases->getEst_land_value_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':est_land_value',$leases->getEst_land_value(),PDO::PARAM_STR);
            $stmt->bindValue(':rate_return_land',$leases->getRate_return_land(),PDO::PARAM_STR);
            $stmt->bindValue(':or_tenant',$leases->getOr_tenant(),PDO::PARAM_STR);
            $stmt->bindValue(':ortypes',$leases->getOrtypes(),PDO::PARAM_STR);
            $stmt->bindValue(':desc_or_space',$leases->getDesc_or_space(),PDO::PARAM_STR);
            $stmt->bindValue(':or_lease_exp_term',$leases->getOr_lease_exp_term(),PDO::PARAM_STR);
            $stmt->bindValue(':or_exp_terms_adj',$leases->getOr_exp_terms_adj(),PDO::PARAM_STR);
            $stmt->bindValue(':other_rent_sf_mo',$leases->getOther_rent_sf_mo(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_or_comment',$leases->getEff_or_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':or_concession_desc',$leases->getOr_concession_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':orterms',$leases->getOrterms(),PDO::PARAM_STR);
            $stmt->bindValue(':or_survey',$leases->getOr_survey(),PDO::PARAM_STR);
            $stmt->bindValue(':sched_or_contracts',$leases->getSched_or_contracts(),PDO::PARAM_STR);            
            $stmt->bindValue(':desc_or_esc_terms',$leases->getDesc_or_esc_terms(),PDO::PARAM_STR);
            $stmt->bindValue(':or_comments',$leases->getOr_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':or_conf_source',$leases->getOr_conf_source(),PDO::PARAM_STR);
            $stmt->bindValue(':or_conf_date',$leases->getOr_conf_date(),PDO::PARAM_STR);
            $stmt->bindValue(':or_confby',$leases->getOr_confby(),PDO::PARAM_STR);
            $stmt->bindValue(':or_fileno',$leases->getOr_fileno(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
            
            $stmt->execute();     
            
            $allMfs = array();
			if(isset($_POST['mfids'])){
				if(stristr($_POST['mfids'],",")!==false){
					$allMfs = explode(",",$_POST['mfids']);
				}else{
					$allMfs[] = $_POST['mfids'];
				}
			}
			
			$mfvalues = $leases->getMfValues();
			for($p=0;$p<count($mfvalues);$p++){
				if($mfvalues[$p]->getId()!=0){
					$stmt = $this->db->prepare("UPDATE ".MFMATRIX_TABLE." SET mfnounits=:mfnounits_".$p.", mfsize=:mfsize_".$p.", mftotalsf=:mftotalsf_".$p.", mfrent=:mfrent_".$p.", mfrentsf=:mfrentsf_".$p.", mfnobr=:mfnobr_".$p." WHERE ".MFMATRIX_TABLE.".FK_ReportID=:FK_ReportID AND ".MFMATRIX_TABLE.".id=:id_".$p."");
					$stmt->bindValue(':id_'.$p,$mfvalues[$p]->getId(),PDO::PARAM_INT);
				}else{
					$stmt = $this->db->prepare("INSERT INTO ".MFMATRIX_TABLE." (FK_ReportID,mfnounits,mfsize,mftotalsf,mfrent,mfrentsf,mfnobr) VALUES (:FK_ReportID,:mfnounits_".$p.",:mfsize_".$p.",:mftotalsf_".$p.",:mfrent_".$p.",:mfrentsf_".$p.",:mfnobr_".$p.")");
				}

				$stmt->bindValue(':mfnounits_'.$p,$mfvalues[$p]->getMfnounits(),PDO::PARAM_INT);
				$stmt->bindValue(':mfsize_'.$p,$mfvalues[$p]->getMfsize(),PDO::PARAM_STR);
				$stmt->bindValue(':mftotalsf_'.$p,$mfvalues[$p]->getMftotalsf(),PDO::PARAM_INT);
				$stmt->bindValue(':mfrent_'.$p,$mfvalues[$p]->getMfrent(),PDO::PARAM_INT);
				$stmt->bindValue(':mfrentsf_'.$p,$mfvalues[$p]->getMfrentsf(),PDO::PARAM_STR);
				$stmt->bindValue(':mfnobr_'.$p,$mfvalues[$p]->getmfnobr(),PDO::PARAM_INT);
				$stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);

				$result = $stmt->execute();
				if (!$result) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
				$index = array_search($mfvalues[$p]->getId(),$allMfs);
				if($index!==false){
					array_splice($allMfs,$index,1);
				}
			}
			
			for($p=0;$p<count($allMfs);$p++){
				$stmt = $this->db->prepare("DELETE FROM ".MFMATRIX_TABLE." WHERE ".MFMATRIX_TABLE.".id=:id_".$p."");
				$stmt->bindValue(':id_'.$p,$allMfs[$p],PDO::PARAM_INT);
				$result = $stmt->execute();
				if (!$result) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
			}
                
            
            $allMss = array();
			if(isset($_POST['ssids'])){
				if(stristr($_POST['ssids'],",")!==false){
					$allMss = explode(",",$_POST['ssids']);
				}else{
					$allMss[] = $_POST['ssids'];
				}
			}
			
			$ssvalues = $leases->getSsvalues();
			for($p=0;$p<count($ssvalues);$p++){
				if($ssvalues[$p]->getId()!=0){
					$stmt = $this->db->prepare("UPDATE ".SSMATRIX_TABLE." SET sssize=:sssize_".$p.", ssunittype=:ssunittype_".$p.", ssrentmo=:ssrentmo_".$p.", ssrentsf=:ssrentsf_".$p.", ssunitsf=:ssunitsf".$p." WHERE ".SSMATRIX_TABLE.".FK_ReportID=:FK_ReportID AND ".SSMATRIX_TABLE.".id=:id_".$p."");
					$stmt->bindValue(':id_'.$p,$ssvalues[$p]->getId(),PDO::PARAM_INT);
				}else{
					$stmt = $this->db->prepare("INSERT INTO ".SSMATRIX_TABLE." (FK_ReportID, sssize, ssunittype, ssrentmo, ssrentsf, ssunitsf) VALUES (:FK_ReportID,:sssize_".$p.",:ssunittype_".$p.",:ssrentmo_".$p.",:ssrentsf_".$p.",:ssunitsf_".$p.")");
				}

				$stmt->bindValue(':sssize_'.$p,$ssvalues[$p]->getSssize(),PDO::PARAM_STR);
				$stmt->bindValue(':ssunittype_'.$p,$ssvalues[$p]->getSsunittype(),PDO::PARAM_STR);
				$stmt->bindValue(':ssrentmo_'.$p,$ssvalues[$p]->getSsrentmo(),PDO::PARAM_STR);
				$stmt->bindValue(':ssrentsf_'.$p,$ssvalues[$p]->getSsrentsf(),PDO::PARAM_STR);
				$stmt->bindValue(':ssunitsf_'.$p,$ssvalues[$p]->getSsunitsf(),PDO::PARAM_INT);
				$stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);

				$result = $stmt->execute();
				if (!$result) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
				$index = array_search($ssvalues[$p]->getId(),$allMss);
				if($index!==false){
					array_splice($allMss,$index,1);
				}
			}
			
			for($p=0;$p<count($allMss);$p++){
				$stmt = $this->db->prepare("DELETE FROM ".SSMATRIX_TABLE." WHERE ".SSMATRIX_TABLE.".id=:id_".$p."");
				$stmt->bindValue(':id_'.$p,$allMss[$p],PDO::PARAM_INT);
				$result = $stmt->execute();
				if (!$result) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
			}
        
        
            $directory = "../comp_images/".$leases->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }

            $images = array();
			foreach ($_FILES['images']['name'] as $key => $val ) {
                $upload_dir = "../comp_images/" . $leases->getId() . "/";
                $upload_image = $upload_dir.$_FILES['images']['name'][$key];
                $file_name = $_FILES['images']['name'][$key];
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image)) {                
					$mediaUtilities->imageTransformations($file_name,$upload_dir,400,400,100,"","","resize",true);
                    $images[] = $upload_image;
                    $FK_ReportID = $leases->getId();
                        if (!empty($images)){                       
                            $caption = $_POST['caption'][$key];
							// insert uploaded images details into MySQL database.
							$stmt = $this->db->prepare("INSERT INTO propphotos (photopath, FK_ReportID, caption) VALUES('" . $file_name . "', '" . $FK_ReportID . "', '" . $caption . "')");
							$stmt->execute(); 
                        }
                }
            }
			$picOrder = explode(",",$_POST['picorder']);
			for($p=0;$p<count($picOrder);$p++){
				$FK_ReportID = $leases->getId();
				$stmt = $this->db->prepare("UPDATE propphotos SET propphotos.order = '".($p+1)."' WHERE FK_ReportID = '".$FK_ReportID."' AND photopath='".$picOrder[$p]."'");
				$stmt->execute(); 
			}

            $stmt = $this->db->prepare("DELETE FROM ".DOC_LINKS." WHERE FK_ReportID=:FK_ReportID");
            $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
            $stmt->execute();

            for($d=0;$d<count($leases->getDocData());$d++){
                $stmt = $this->db->prepare("INSERT INTO ".DOC_LINKS." (boxurl, file_label,FK_ReportID) VALUES  (:boxurl,:file_label,:FK_ReportID)");
                $stmt->bindValue(':boxurl',$leases->getDocData()[$d]->boxurl,PDO::PARAM_STR);
                $stmt->bindValue(':file_label',$leases->getDocData()[$d]->file_label,PDO::PARAM_STR);
                $stmt->bindValue(':FK_ReportID',$leases->getId(),PDO::PARAM_INT);
                $stmt->execute();
            }

            $this->db->commit();
        }catch (PDOException $e) {
            print_r($e);
            $this->db->rollBack(); //cancel db changes if something goes wrong
            return $leases;
            die();
        }
        
        return $leases;
    }
}
?>