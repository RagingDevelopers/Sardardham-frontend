<!-- Popup Modal Dynamic -->
<?php
$popup = $this->db->where('status', 'ACTIVE')
    ->where('schedule_date <=', date('Y-m-d'))
    ->where('end_date >=', date('Y-m-d'))
    ->limit(3)
    ->get('pop_up_activity')
    ->result();

function first_n_words($text, $limit = 20)
{
    $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $text = strip_tags($text);
    $text = preg_replace('/\s+/u', ' ', trim($text));
    if ($text === '')
        return '';
    $words = preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
    $more = count($words) > $limit;
    $words = array_slice($words, 0, $limit);
    return implode(' ', $words) . ($more ? '…' : '');
}
?>

<?php if (!empty($popup)): ?>
    <div class="modal fade" id="popupModel" tabindex="-1" aria-labelledby="popupModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <div class="modal-header border-0 pb-2">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <?php foreach ($popup as $row): ?>
                        <div class="popup-card d-flex align-items-center justify-content-between p-3 mb-3"
                            style="background: #fff; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

                            <!-- Left: Image -->
                            <div class="popup-image text-center" style="flex: 0 0 100px;">
                                <?php if (!empty($row->photo)): ?>
                                    <img src="<?= base_url('upload/' . $row->photo) ?>" alt="Popup Image"
                                        style="width: 100%; height: auto; object-fit: contain;">
                                <?php endif; ?>
                            </div>

                            <!-- Center: Title & Description -->
                            <div class="popup-text flex-grow-1 px-4">
                                <h5 class="fw-bold mb-2" style="color:#000;">
                                    <?= ($row->title) ?>
                                </h5>
                                <?php if (!empty($row->description)): ?>
                                    <p class="popup-description m-0 text-secondary">
                                        <?= html_escape(first_n_words($row->description, 20)) ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <!-- Right: Read More Button -->
                            <div class="popup-btn text-center">
                                <?php if (!empty($row->link)): ?>
                                    <a href="<?= ($row->link) ?>" target="_blank" class="btn btn-success fw-semibold"
                                        style="border-radius: 8px; padding: 10px 20px; background-color: #008542; border:none;">
                                        Read More
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var myModal = new bootstrap.Modal(document.getElementById('popupModel'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>

    <style>
        /* Description styling - now allows full 20 words to show */
        .popup-description {
            display: block !important;
            overflow: visible !important;
            text-overflow: clip !important;
            font-size: 0.95rem;
        }

        .popup-btn {
            flex: 0 0 150px;
        }

        .modal-backdrop.show {
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .popup-card {
                flex-direction: column;
                text-align: center;
            }

            .popup-image {
                display: none !important;
            }

            .popup-btn {
                flex: 0 0 auto;
                margin-top: 10px;
            }

            .popup-text {
                padding: 0 !important;
            }
        }
    </style>
<?php endif; ?>