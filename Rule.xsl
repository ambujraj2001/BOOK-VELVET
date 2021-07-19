<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
<xsl:for-each select="breakfast_menu/food">
  <div style="background-color:teal;color:white;padding:4px ;">
    <span style="font-weight:bold;font-size:22pt"><xsl:value-of select="name"/>  </span>
    <xsl:value-of select="price"/>
    </div>
  <div style="margin-left:0px;margin-bottom:1em;font-size:18pt">
    <p>
    <xsl:value-of select="description"/>
    <span style="font-style:italic"><xsl:value-of select="calories"/> </span>
    </p>
  </div>
</xsl:for-each>
</body>
</html>