<section class="page-section bg-light">
    <div class="container">
        <div class="text-left mt-2">
            <h2 class="section-heading text-uppercase"><a href="<?= BASEURL ?>"><i class="fas fa-arrow-left"></i></a>  <?= $data['destination']['nama_destinasi'] ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <img class="rounded" src="<?= $data['destination']['url_img'] ?>" alt="<?= $data['destination']['nama_destinasi'] ?>" />
                </div>
                <div class="card-body mt-3">
                    <h5 class="text-muted">About This Destination</h5>
                    <p class="card-text"><?= $data['destination']['deskripsi'] ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Ticket Tersedia</h3>
                    </div>
                    <form id="ticket-form" method="POST" action="<?= BASEURL ?>/pesan/confirm" class="container p-3">
                        <select id="ticket-select" name="ticket_id" class="form-select mb-2" onchange="updateTicketInfo()">
                            <option selected>See all ticket</option>
                            <?php foreach ($data['tiket'] as $tiket) : ?>
                                <option value="<?= $tiket['id'] ?>"><?= $tiket['nama_tiket'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <ul class="list-group list-group-flush mb-2">
                            <li id="selected-ticket" class="list-group-item">Tiket yang dipilih : </li>
                            <li id="ticket-stock" class="list-group-item">Stok Tersedia : </li>
                            <li id="ticket-price" class="list-group-item">Harga satu Tiket : </li>
                        </ul>
                        <div class="container rounded bg-dark text-white d-flex justify-content-between">
                            <div class="col-6">
                                <p id="total-price">Total: </p>
                            </div>
                            <div class="col-6 d-flex justify-content-end p-2">
                                <a id="decrement" class="btn btn-rounded btn-primary" role="button" onclick="updateQuantity(-1)"><i class="fas fa-minus"></i></a>
                                <p id="quantity" class="mx-2">1</p>
                                <a id="increment" class="btn btn-rounded btn-primary" role="button" onclick="updateQuantity(1)"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                        <input type="hidden" name="total_price" id="hidden-total-price" value="0">
                        <input type="hidden" name="destination_id" value="<?= $data['destination']['id'] ?>">
                        <div class="container d-flex justify-content-center my-3">
                            <button id="pesan-button" type="submit" class="btn btn-rounded w-100 btn-dark" disabled>Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-left d-flex justify-content-between">
                <h2 class="section-heading">More Destinations</h2>
            </div>
            <div class="row">
                <?php if (empty($data['destinasi'])): ?>
                    <div class="col-12 text-center">
                        <p>Oops data destinasi sedang liburan~</p>
                    </div>
                <?php else: ?>
                    <?php 
                    $index = 1; 
                    foreach ($data['destinasi'] as $dest) : 
                        if ($index > 6) break;
                    ?>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#destination<?= $index ?>">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img style="object-fit: cover; width: 100%; height: 250px;" class="img-fluid" src="<?= $dest['url_img'] ?>" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading"><?= $dest['nama_destinasi'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $index++; 
                    endforeach; 
                    ?>
                    <?php if (count($data['destinasi']) > 6): ?>
                        <div class="col-12 text-center">
                            <a class="btn btn-primary btn-xl text-uppercase" href="<?= BASEURL ?>/destinasi">Lihat destinasi lengkap <i class="fas fa-arrow-right"></i></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</section>

<script>
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });

    let selectedTicket = null;
    let quantity = 1;

    function updateTicketInfo() {
        const select = document.getElementById('ticket-select');
        const selectedOption = select.options[select.selectedIndex];
        const ticketId = selectedOption.value;
        const ticketName = selectedOption.text;

        const tickets = <?= json_encode($data['tiket']) ?>;
        selectedTicket = tickets.find(ticket => ticket.id == ticketId);

        let ticketPrice = formatter.format(selectedTicket.harga);

        document.getElementById('selected-ticket').innerText = `Tiket yang dipilih : ${ticketName}`;
        document.getElementById('ticket-stock').innerText = `Stok Tersedia : ${selectedTicket.stok_tiket}`;
        document.getElementById('ticket-price').innerText = `Harga satu Tiket : ${ticketPrice}`;

        updateTotalPrice();
        updatePesanButtonState();
    }

    function updateQuantity(change) {
        quantity = Math.max(1, quantity + change);
        document.getElementById('quantity').innerText = quantity;
        document.getElementById('hidden-quantity').value = quantity;
        updateTotalPrice();
    }

    function updateTotalPrice() {
        const totalPrice = selectedTicket ? selectedTicket.harga * quantity : 0;
        let formattedTotalPrice = formatter.format(totalPrice);
        document.getElementById('total-price').innerText = `Total: ${formattedTotalPrice}`;
        document.getElementById('hidden-total-price').value = totalPrice;
    }

    function updatePesanButtonState() {
        const pesanButton = document.getElementById('pesan-button');
        if (selectedTicket != null) {
            pesanButton.disabled = false;
            pesanButton.classList.remove('btn-dark');
            pesanButton.classList.add('btn-success');
        } else {
            pesanButton.disabled = true;
            pesanButton.classList.remove('btn-success');
            pesanButton.classList.add('btn-dark');
        }
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        updatePesanButtonState();
    });
</script>
