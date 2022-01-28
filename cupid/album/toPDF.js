function saveAsPdf() {
    let doc = new PDFDocument({autoFirstPage:false});
    var imag = document.createElement("img");
    imag.src="./back.jpg";
    var canv = document.createElement("canvas");
    canv.width=595;
    canv.height=840;
    canv.getContext("2d").drawImage(imag,0,0);
    var background = canv.toDataURL();
    containers.forEach(container => {
        doc.addPage({size: [595,840]});
        doc.image(background,0,0,{width: 595, height:840});
        var counter = 0;
        var imagesPerPage = container.children.length;
        Array.from(container.children).forEach(element => {
            counter++;
            var img = element.children[0];
            var canvas = document.createElement("canvas");
            canvas.width=img.naturalWidth;
            canvas.height=img.naturalHeight;
            canvas.getContext("2d").drawImage(img,0,0);
            if(imagesPerPage==1 || (counter%2!=0 && counter==imagesPerPage))
                doc.image(canvas.toDataURL(),40,70,{fit: [515, 700], align: 'center', valign: 'center'}).rect(40,70,515,700);
            else{
                if (counter == 1){
                    doc.image(canvas.toDataURL(),40,70,{fit: [515, 340], align: 'center', valign: 'center'}).rect(40,70,515,340);
                }
                else{
                    doc.image(canvas.toDataURL(),40,430,{fit: [515, 340], align: 'center', valign: 'center'}).rect(40,430,515,340);
                }
            }
            if(counter%2 == 0 && counter!=imagesPerPage){
                doc.addPage({size: [595,840]});
                doc.image(background,0,0,{width: 595, height:840});
            }
        })
    });

    let stream = doc.pipe(blobStream());
    stream.on("finish", function() {
        let blob = stream.toBlobURL("application/pdf");
        var link = document.createElement("a");
        link.download = "album.pdf";
        link.href = blob;
        link.click();
    });
    doc.end();

}