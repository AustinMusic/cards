<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <w:document xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:cx="http://schemas.microsoft.com/office/drawing/2014/chartex" xmlns:cx1="http://schemas.microsoft.com/office/drawing/2015/9/8/chartex" xmlns:cx2="http://schemas.microsoft.com/office/drawing/2015/10/21/chartex" xmlns:cx3="http://schemas.microsoft.com/office/drawing/2016/5/9/chartex" xmlns:cx4="http://schemas.microsoft.com/office/drawing/2016/5/10/chartex" xmlns:cx5="http://schemas.microsoft.com/office/drawing/2016/5/11/chartex" xmlns:cx6="http://schemas.microsoft.com/office/drawing/2016/5/12/chartex" xmlns:cx7="http://schemas.microsoft.com/office/drawing/2016/5/13/chartex" xmlns:cx8="http://schemas.microsoft.com/office/drawing/2016/5/14/chartex" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:aink="http://schemas.microsoft.com/office/drawing/2016/ink" xmlns:am3d="http://schemas.microsoft.com/office/drawing/2017/modeaad" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:wp14="http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing" xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main" xmlns:w14="http://schemas.microsoft.com/office/word/2010/wordml" xmlns:w15="http://schemas.microsoft.com/office/word/2012/wordml" xmlns:w16cid="http://schemas.microsoft.com/office/word/2016/wordml/cid" xmlns:w16se="http://schemas.microsoft.com/office/word/2015/wordml/symex" xmlns:wpg="http://schemas.microsoft.com/office/word/2010/wordprocessingGroup" xmlns:wpi="http://schemas.microsoft.com/office/word/2010/wordprocessingInk" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wps="http://schemas.microsoft.com/office/word/2010/wordprocessingShape" mc:Ignorable="w14 w15 w16se w16cid wp14">
      <w:body>
        <xsl:for-each select="root/row">
          <w:p w:rsidR="00DF43C0" w:rsidRDefault="00C777DF" w:rsidP="00112A05">
            <w:pPr>
              <w:jc w:val="both"/>
            </w:pPr>
            <w:r w:rsidRPr="00C777DF">
              <w:rPr>
                <w:b/>
              </w:rPr>
              <w:t xml:space="preserve">Land Sale <xsl:value-of select="rank"/></w:t>
            </w:r>
            <w:r>
              <w:t xml:space="preserve"> (<xsl:value-of select="price"/><xsl:value-of select="adjusted"/></w:t>
            </w:r>
            <w:r w:rsidR="00112A05">
              <w:t xml:space="preserve"> </w:t>
            </w:r>
            <w:proofErr w:type="spellStart"/>
            <w:r w:rsidR="00112A05">
              <w:t xml:space="preserve"><xsl:value-of select="record_date"/></w:t>
            </w:r>
            <w:proofErr w:type="spellEnd"/>
            <w:r w:rsidR="00112A05">
              <w:t xml:space="preserve"></w:t>
            </w:r>
            <w:r>
              <w:t xml:space="preserve"> </w:t>
            </w:r>
            <w:proofErr w:type="spellStart"/>
            <w:r>
              <w:t><xsl:value-of select="sale_comments"/></w:t>
            </w:r>
            <w:proofErr w:type="spellEnd"/>
          </w:p>
          <w:p w:rsidR="00C777DF" w:rsidRDefault="00C777DF">
            <w:bookmarkStart w:id="0" w:name="_GoBack"/>
            <w:bookmarkEnd w:id="0"/>
          </w:p>
        </xsl:for-each>
        <w:sectPr w:rsidR="00C777DF">
          <w:pgSz w:w="12240" w:h="15840"/>
          <w:pgMar w:top="1440" w:right="1440" w:bottom="1440" w:left="1440" w:header="720" w:footer="720" w:gutter="0"/>
          <w:cols w:space="720"/>
          <w:docGrid w:linePitch="360"/>
        </w:sectPr>
      </w:body>
    </w:document>
  </xsl:template>
</xsl:stylesheet>