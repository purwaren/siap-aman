<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function beforeAction($action)
	{

		return true;
	}

	/**
	 * Export to pdf
	 * @param $data Array of html data that will be generated on every page
	 * @param String $name, name of pdf doc
	 * @param String $option option for exporting, I -> inline, D ->force download
	 * @param String $pageFormat array(width, height) of the page
	 */
	public function publishPDF($data,$name='export.pdf',$option='F',$pageFormat='A5',$pageOrientation='L')
	{
		Yii::import('application.vendor.tcpdf.*');
		// create new PDF document
		$pdf = new TCPDF($pageOrientation, PDF_UNIT, $pageFormat, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Al-Ulum');
		$pdf->SetTitle('Al-Ulum');
		$pdf->SetSubject('Dokumen Al-Ulum Terpadu');

		//$pdf->SetFont('courier', '', 10);
		// set default header data
		$company = Yii::app()->params['company'];

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		//set margins
		$pdf->SetMargins(2, 2, 2);
		$pdf->SetHeaderMargin(0);
		$pdf->SetFooterMargin(0);

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


		//set some language-dependent strings
		//$pdf->setLanguageArray($l);

		// set font
		$pdf->SetFont('dejavusans', '', 10);

		// ---------------------------------------------------------
		// Begin writing content of PDF
		$pdf->AddPage();
		$pdf->writeHTML($data,TRUE,FALSE,TRUE,FALSE,'');
		$pdf->Output($name,$option);
	}
}