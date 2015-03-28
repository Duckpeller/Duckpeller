<?php
namespace Duckpeller;
use \InvalidArgumentException;
use \LogicException;
use \Exception;

use DuckPeller\Shell\Factory,
    DuckPeller\Shell\StartCreator,
    DuckPeller\Shell\FinishCreator,
    DuckPeller\Shell\ImageCreator,
    DuckPeller\Shell\StepCreator,
    DuckPeller\Shell\LinkCreator,
    DuckPeller\Shell\NotifyCreator,
    DuckPeller\Shell\ErrorCreator;

class Shell {
    CONST IMAGE  = "container";
    CONST LINK   = "links";
    CONST STEP   = "steps";
    CONST NOTIFY = "notify";

    protected $parser;
    protected $factory;

    public function __construct($filename) {
        try {
            $this->parser = new YamlParser($filename);
            $this->factory = new Factory;
        } catch (InvalidArgumentException $e) {
            return $this->factory->get(new ErrorCreator)->build($e->getMessage());
        } catch (LogicException $e) {
            return $this->factory->get(new ErrorCreator)->build($e->getMessage());
        } catch (Exception $e) {
            return $this->factory->get(new ErrorCreator)->build($e->getMessage());
        }
    }

    public function createDockerScript() {
        try {
            $image = $this->parser->getImage(self::IMAGE);
            return $this->factory->get(new ImageCreator)->build($image);
        } catch(Exception $e) {
            return $this->factory->get(new ErrorCreator)->build($e->getMessage());
        }
    }

    public function createLinksScript() {
        $links = $this->parser->getLinks(self::LINK);
        return $this->factory->get(new LinkCreator)->build($links);
    }

    public function createStepScript() {
        $steps = $this->parser->getStep(self::STEP);
        return $this->factory->get(new StepCreator)->build($steps);
    }

    public function createNotifyScript() {
        $steps = $this->parser->getNotify(self::NOTIFY);
        return $this->factory->get(new NotifyCreator)->build($steps);
    }
}
