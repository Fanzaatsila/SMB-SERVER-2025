function sendToWhatsApp(event) {
    event.preventDefault();
    
    // Ambil nilai dari form
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    
    // Format pesan untuk WhatsApp
    const whatsappMessage = `*Pesan dari Website SMB*%0A%0A` +
        `*Nama:* ${encodeURIComponent(name)}%0A` +
        `*Email:* ${encodeURIComponent(email)}%0A` +
        `*No Telepon:* ${encodeURIComponent(phone)}%0A` +
        `*Subjek:* ${encodeURIComponent(subject)}%0A%0A` +
        `*Pesan:*%0A${encodeURIComponent(message)}`;
    
    // Nomor WhatsApp tujuan
    const whatsappNumber = '6281220183537';
    
    // Redirect ke WhatsApp
    window.open(`https://wa.me/${whatsappNumber}?text=${whatsappMessage}`, '_blank');
    
    // Reset form
    document.getElementById('contactForm').reset();
}
