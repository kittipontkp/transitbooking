# pdfmake-support-th

![alt text](https://raw.githubusercontent.com/tarathep/pdfmake-support-th/master/examples/pdf_output_example.jpg)

PDF document generation library for server-side and client-side in pure JavaScript add support TH.


Check out [the playground](http://bpampuch.github.io/pdfmake/playground.html) and [examples](https://github.com/bpampuch/pdfmake/tree/master/examples).

### Example
```
import pdfMake from "pdfmake-support-th/build/pdfmake";
import pdfFonts from "pdfmake-support-th/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;

//ไฟล์เพิ่ม font
pdfMake.fonts = {
    THSarabunNew: {
        normal: 'THSarabunNew.ttf',
        bold: 'THSarabunNew-Bold.ttf',
        italics: 'THSarabunNew-Italic.ttf',
        bolditalics: 'THSarabunNew-BoldItalic.ttf'
    },
    Roboto: {
        normal: 'Roboto-Regular.ttf',
        bold: 'Roboto-Medium.ttf',
        italics: 'Roboto-Italic.ttf',
        bolditalics: 'Roboto-MediumItalic.ttf'
    }
}

//ตัวอย่างการใช้
var docDefinition = {
    content: [{
        layout: 'lightHorizontalLines',
        table: {
            headerRows: 1,
            widths: ['*', 100, 100, 100, '*'],
            body: [
               ['Manner Group Code', 'Manner Group Name', 'Manner Code', 'Manner Code Name', 'Status'],
               ['M01', 'อาการหน้าจอ', 'M01123', '12345', 'active'],
               ['M04', 'อาการเกี่ยวกับเสียงสนทนา', 'M04123', '1234567890', 'active']
            ]
        }

    }, ],
    defaultStyle: {
        font: "THSarabunNew"
    }
};

pdfMake.createPdf(docDefinition).open();
```
### Features

* line-wrapping,
* text-alignments (left, right, centered, justified),
* numbered and bulleted lists,
* tables and columns
  * auto/fixed/star-sized widths,
  * col-spans and row-spans,
  * headers automatically repeated in case of a page-break,
* images and vector graphics,
* convenient styling and style inheritance,
* page headers and footers:
  * static or dynamic content,
  * access to current page number and page count,
* background-layer,
* page dimensions and orientations,
* margins,
* custom page breaks,
* font embedding,
* support for complex, multi-level (nested) structures,
* table of contents,
* helper methods for opening/printing/downloading the generated PDF,
* setting of PDF metadata (e.g. author, subject).

## Documentation

Documentation URL: https://pdfmake.github.io/docs/

## Building from sources

using npm:
```
git clone https://github.com/tarathep/pdfmake-support-th.git
cd pdfmake
npm install
npm run build
```

## License
MIT

## Authors
* [@bpampuch](https://github.com/bpampuch) (founder)
* [@liborm85](https://github.com/liborm85)
* [@tarathep](https://github.com/tarathep/pdfmake) (support TH)

pdfmake is modify and inlucde for support thai language original base from pdfmake is based on a truly amazing library [pdfkit](https://github.com/devongovett/pdfkit) (credits to [@devongovett](https://github.com/devongovett)).

Thanks to all contributors.
