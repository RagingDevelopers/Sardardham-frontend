<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Philanthropist extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $page_data['page_name'] = "philanthropist-new-2";
        $page_data['page_title'] = "Philanthropist";

        $page_data['categories'] = $this->db
            ->select(["id", langSelect("name")])
            ->order_by("short_order", "ASC")
            ->get("category")
            ->result_array();

        $page_data['zones'] = $this->db
            ->select(["id", langSelect("short_name")])
            ->get("zone")
            ->result_array();

        $existingCategoryIds = array_column($page_data['categories'], 'id');
        $existingZoneIds = array_column($page_data['zones'], 'id');

        $defaultCategoryId = 2;
        $defaultZone = '';
        $defaultPage = 1;

        $selected_category = $this->input->get('category');
        $selected_zone = $this->input->get('zone');
        $page = $this->input->get('page'); // raw first

        $isAjax = ($this->input->get('ajax') == '1' || $this->input->is_ajax_request());
        $needsRedirect = false;

        if ($selected_category === null || $selected_category === '' || !in_array($selected_category, $existingCategoryIds)) {
            $selected_category = $defaultCategoryId;
            $needsRedirect = true;
        }

        if ($selected_zone !== null && $selected_zone !== '') {
            if (!in_array($selected_zone, $existingZoneIds)) {
                $selected_zone = $defaultZone; // ""
                $needsRedirect = true;
            }
        } else {
            $selected_zone = $defaultZone;
        }

        if ($page === null || $page === '' || !ctype_digit((string) $page) || (int) $page < 1) {
            $page = $defaultPage;
            $needsRedirect = true;
        } else {
            $page = (int) $page;
        }

        if ($needsRedirect && !$isAjax) {
            $cleanQuery = http_build_query([
                'category' => $selected_category,
                'zone' => $selected_zone,
                'page' => $page,
            ]);
            redirect(base_url('about-us/philanthropist') . '?' . $cleanQuery, 'location', 302);
            return;
        }

        $_GET['category'] = $selected_category;
        $_GET['zone'] = $selected_zone;

        $per_page = 26;

        $total = $this->getPhilanthropistCount();
        $total_pages = $total > 0 ? (int) ceil($total / $per_page) : 1;

        if ($page > $total_pages) {
            if (!$isAjax) {
                $cleanQuery = http_build_query([
                    'category' => $selected_category,
                    'zone' => $selected_zone,
                    'page' => 1,
                ]);
                redirect(base_url('about-us/philanthropist') . '?' . $cleanQuery, 'location', 302);
                return;
            } else {
                $page = 1;
            }
        }

        $offset = ($page - 1) * $per_page;

        $philanthropists = $this->getPhilanthropist($per_page, $offset);

        $page_data['philanthropists'] = $philanthropists;
        $page_data['selected_category'] = $selected_category;
        $page_data['selected_zone'] = $selected_zone;
        $page_data['current_page'] = $page;
        $page_data['per_page'] = $per_page;
        $page_data['total'] = $total;
        $page_data['total_pages'] = $total_pages;

        $list_html = $this->build_list_html($philanthropists);
        $pagination_html = $this->build_pagination_html(
            $selected_category,
            $selected_zone,
            $page,
            $total_pages
        );

        $page_data['list_html'] = $list_html;
        $page_data['pagination_html'] = $pagination_html;

        if ($isAjax) {
            $payload = [
                'list_html' => $list_html,
                'pagination_html' => $pagination_html,
                'selected_category' => $selected_category,
                'selected_zone' => $selected_zone,
                'current_page' => $page,
                'total_pages' => $total_pages,
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($payload));
            return;
        }

        $this->load->view('common', $page_data);
    }

    public function load_more()
    {
        if (!$this->input->is_ajax_request()) {
            exit('Unauthorized');
        }

        $limit = 20;
        $offset = $this->input->post('offset');

        $philanthropists = $this->getPhilanthropist($limit, $offset);

        header('Content-Type: application/json');
        echo json_encode($philanthropists);
    }

    private function getPhilanthropist($limit, $offset)
    {
        $this->db->select([
            "P." . langSelect("name"),
            langSelect("company"),
            "C." . langColumn("name") . " AS city",
            "CT." . langColumn("name") . " AS category",
            "Z." . langColumn("name") . " AS zone",
            "P.image as photo"
        ])
            ->join("city C", "C.id = P.city_id", "LEFT")
            ->join("category CT", "CT.id = P.category_id", "LEFT")
            ->join("zone Z", "Z.id = P.zone_id", "LEFT");

        if (!empty($category_id = $this->input->get_post('category'))) {
            $this->db->where("P.category_id", $category_id);
        }
        if (!empty($zone_id = $this->input->get_post('zone'))) {
            $this->db->where("P.zone_id", $zone_id);
        }

        return $this->db
            ->limit($limit, $offset)
            ->get("philanthropist P")
            ->result_array();
    }

    private function getPhilanthropistCount()
    {
        $this->db->from("philanthropist P");

        if (!empty($category_id = $this->input->get_post('category'))) {
            $this->db->where("P.category_id", $category_id);
        }
        if (!empty($zone_id = $this->input->get_post('zone'))) {
            $this->db->where("P.zone_id", $zone_id);
        }

        return $this->db->count_all_results();
    }

    public function new()
    {
        $page_data['page_name'] = "philanthropist-new-2";
        $page_data['page_title'] = "Philanthropists";
        $page_data['philanthropists'] = $this->getPhilanthropist(20, 0);
        $this->load->view('common', $page_data);
    }

    public function new2()
    {
        $page_data['page_name'] = "philanthropist-new-2";
        $page_data['page_title'] = "Philanthropists";
        $page_data['philanthropists'] = $this->getPhilanthropist(20, 0);
        $this->load->view('common', $page_data);
    }

    public function new3()
    {
        $page_data['page_name'] = "philanthropist-new-3";
        $page_data['page_title'] = "Philanthropists";
        $page_data['philanthropists'] = $this->getPhilanthropist(20, 0);
        $this->load->view('common', $page_data);
    }

    private function build_list_html($philanthropists)
    {
        $dummyImage = base_url() . 'upload/men-image.jpg';
        ob_start(); ?>
        <div class="row" id="philanthropists-wrapper">
            <?php if (!empty($philanthropists)): ?>
                <?php foreach ($philanthropists as $philanthropist): ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                        <div class="philanthropist-item">
                            <a href="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>" target="_blank" class="fancylight popup-btn">
                                <img src="<?= base_url() ?>upload/<?= $philanthropist['photo']; ?>"
                                    alt="<?= $philanthropist['name']; ?>" onerror="this.src='<?= $dummyImage ?>'">
                            </a>
                            <div class="content">
                                <h5><?= $philanthropist['name']; ?></h5>
                                <p><?= $philanthropist['company'] ?? ''; ?></p>
                                <p><?= $philanthropist['city'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center mb-4">No philanthropists found.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }

    private function build_pagination_html($currentCategory, $currentZone, $currentPage, $totalPages)
    {
        $baseUrl = base_url('about-us/philanthropist');

        $q = function ($base, $params = []) {
            return $base . '?' . http_build_query($params);
        };

        $prevDisabled = ($currentPage <= 1);
        $nextDisabled = ($currentPage >= $totalPages);

        $prevLink = $prevDisabled
            ? '#'
            : $q($baseUrl, [
                'category' => $currentCategory,
                'zone' => $currentZone,
                'page' => $currentPage - 1
            ]);

        $nextLink = $nextDisabled
            ? '#'
            : $q($baseUrl, [
                'category' => $currentCategory,
                'zone' => $currentZone,
                'page' => $currentPage + 1
            ]);

        ob_start();
        if ($totalPages > 1): ?>
            <div class="philanthro-pagination-inner">
                <div class="philanthro-pagination d-flex justify-content-between align-items-center flex-wrap">

                    <div>
                        <a class="pager-btn <?= $prevDisabled ? 'disabled' : ''; ?>" href="<?= $prevLink; ?>">
                            ⇽ <?= lang('prev') ?: 'Prev'; ?>
                        </a>
                    </div>

                    <div class="page-list">
                        <?php
                        $start = max(1, $currentPage - 2);
                        $end = min($totalPages, $currentPage + 2);

                        if ($start > 1) {
                            $firstLink = $q($baseUrl, [
                                'category' => $currentCategory,
                                'zone' => $currentZone,
                                'page' => 1
                            ]);
                            echo '<div class="page-item-custom"><a class="page-link-custom" href="' . $firstLink . '">1</a></div>';
                            if ($start > 2) {
                                echo '<span class="dots">...</span>';
                            }
                        }

                        for ($i = $start; $i <= $end; $i++):
                            $isActive = ($i == $currentPage);
                            $link = $q($baseUrl, [
                                'category' => $currentCategory,
                                'zone' => $currentZone,
                                'page' => $i
                            ]);
                            ?>
                            <div class="page-item-custom <?= $isActive ? 'active' : ''; ?>">
                                <a class="page-link-custom" href="<?= $link; ?>"><?= $i; ?></a>
                            </div>
                        <?php endfor; ?>

                        <?php
                        if ($end < $totalPages) {
                            if ($end < $totalPages - 1) {
                                echo '<span class="dots">...</span>';
                            }
                            $lastLink = $q($baseUrl, [
                                'category' => $currentCategory,
                                'zone' => $currentZone,
                                'page' => $totalPages
                            ]);
                            echo '<div class="page-item-custom"><a class="page-link-custom" href="' . $lastLink . '">' . $totalPages . '</a></div>';
                        }
                        ?>
                    </div>

                    <div>
                        <a class="pager-btn <?= $nextDisabled ? 'disabled' : ''; ?>" href="<?= $nextLink; ?>">
                            <?= lang('next') ?: 'Next'; ?> ⇾
                        </a>
                    </div>

                </div>
            </div>
        <?php else: ?>
            <div class="philanthro-pagination" style="display:none;"></div>
        <?php
        endif;
        return ob_get_clean();
    }
}
?>