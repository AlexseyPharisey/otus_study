<?php

declare(strict_types=1);

namespace patterns\templateMethod;

abstract class ReportGenerator {
    public final function generateReport() {
        $this->collectData();
        $this->formatData();
        $this->exportReport();
    }

    abstract protected function collectData();
    abstract protected function formatData();
    abstract protected function exportReport();
}

class HTMLReportGenerator extends ReportGenerator {
    protected function collectData() {
        echo "Сбор данных для HTML отчета.\n";
    }

    protected function formatData() {
        echo "Форматирование данных в HTML.\n";
    }

    protected function exportReport() {
        echo "Экспорт отчета в HTML файл.\n";
    }
}

class PDFReportGenerator extends ReportGenerator {
    protected function collectData() {
        echo "Сбор данных для PDF отчета.\n";
    }

    protected function formatData() {
        echo "Форматирование данных в PDF.\n";
    }

    protected function exportReport() {
        echo "Экспорт отчета в PDF файл.\n";
    }
}

function clientCode(ReportGenerator $generator) {
    $generator->generateReport();
}

echo "Генерация HTML отчета:\n";
clientCode(new HTMLReportGenerator());
echo "\n";

echo "Генерация PDF отчета:\n";
clientCode(new PDFReportGenerator());