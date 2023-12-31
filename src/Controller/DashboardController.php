<?php

namespace App\Controller;
use App\Entity\Project;
use App\Entity\User;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DashboardController extends AbstractController
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(User $user, ProjectRepository $projectRepository): Response
    {
        // Benutzerobjekt abrufen
        $user = $this->tokenStorage->getToken()->getUser();

        // Rollen des Benutzers abrufen
        $roles = $user->getRoles();

        // Projekte abrufen
        $projects = $projectRepository->findAll();

        // Maximale ID berechnen
        $maxId = $this->getMaxId($projects);

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'roles' => $roles,
            'projects' => $projects,
            'maxId' => $maxId,
        ]);
    }

    private function getMaxId(array $projects): int
    {
        $maxId = 0;
        foreach ($projects as $project) {
            $maxId = max($maxId, $project->getId());
        }
        return $maxId;
    }
}

